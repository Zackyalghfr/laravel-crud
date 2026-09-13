<?php

namespace App\Http\Controllers;

// import model product
use App\Models\Product;
// import return type redirectResponse
use Illuminate\Http\RedirectResponse;
// import return type view
use Illuminate\View\View;
// import http request
use Illuminate\Http\Request;
// import facades storage
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @return View
     */
    public function index(): View // menampilkan daftar produk
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View // menampilkan form tambah data product
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse // melakukan proses insert data ke dalam db & upload gambar
    {
        $request->validate([ // proses validate form
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('product', $image->hashName(), 'public');

        // proses insert data ke dalam db
        Product::create([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);
        
        // redirect to route & increase flash session
        return redirect()->route('products.index')->with(['success' => 'Data berhasil disimpan!']);
    }   
        /**
         * show
         * @param mixed $id
         * @return View
         */

        public function show (String $id): View{

            // get product by id
            $product = Product::findOrFail($id);

            // render view with product     
            return view('products.show', compact('product'));
        
    }

    /**
     * edit
     * 
     * @param mixed $id
     * @return view
     */

    public function edit (String $id): View {

        // get product by id
        $product = Product::findOrFail($id);

        // render view with product
        return view('products.edit', compact('product'));

    }

    /**
     * update
     * 
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */

    public function update (Request $request, String $id): RedirectResponse {

        // validasi form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        // get product by id
        $product = Product::findOrFail($id);

        // check if image is uploaded
        if ($request->hasFile('image')) {

            // hapus gambar lama 
            Storage::disk('public')->delete('product/'.$product->image);

            // upload gambar baru
            $image = $request->file('image');
            $image->storeAs('product', $image->hashName(), 'public');

            // update product with new image
             $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);

              } else {

            //update product without image
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }
         //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);

        }

        /**
         * delete
         * 
         * @param mixed $id
         * @return RedirectResponse
         */

        public function destroy($id): RedirectResponse {

            // get product by id
            $product = Product::findOrFail($id);

            // delete image
            Storage::disk('public')->delete('product/'.$product->image);

            // delete product
            $product->delete();

            // redirect to index
            return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }
    }
