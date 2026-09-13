<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CKEditor (opsional, untuk rich text description) -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="text-center">
            <h5 class="text-sm">
            </h5>
            <hr class="my-6 border-gray-200">
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200">
            <div class="p-6">

                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-lg font-semibold text-gray-900">Edit Product</h4>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800 transition">
                        BACK
                    </a>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">IMAGE</label>

                        <div class="mb-3">
                            <img src="{{ asset('/storage/product/'.$product->image) }}"
                                 class="w-[200px] rounded-lg border border-gray-200"
                                 alt="{{ $product->title }}">
                        </div>

                        <input type="file" name="image"
                               class="block w-full text-sm
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:bg-gray-900 file:text-white
                                      hover:file:bg-gray-800
                                      border border-gray-200 rounded-lg bg-white">
                        @error('image')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">TITLE</label>
                        <input type="text" name="title" value="{{ old('title', $product->title) }}"
                               placeholder="Masukkan Title Product"
                               class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200">
                        @error('title')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">DESCRIPTION</label>
                        <textarea name="description" id="description" rows="6"
                                  class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200"
                                  placeholder="Masukkan Description Product">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">PRICE</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                   placeholder="Masukkan Harga Product"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200">
                            @error('price')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">STOCK</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                   placeholder="Masukkan Stock Product"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200">
                            @error('stock')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 rounded-lg
                                       bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition">
                            UPDATE
                        </button>

                        <button type="reset"
                                class="inline-flex items-center justify-center px-4 py-2 rounded-lg
                                       bg-amber-500 text-white text-sm font-semibold hover:bg-amber-600 transition">
                            RESET
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
