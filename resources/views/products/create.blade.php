<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Product</title>

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
                    <h4 class="text-lg font-semibold text-gray-900">Tambah Product</h4>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800 transition">
                        BACK
                    </a>
                </div>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">IMAGE</label>
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
                        <input type="text" name="title" value="{{ old('title') }}"
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
                                  placeholder="Masukkan Description Product">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">PRICE</label>
                            <input type="number" name="price" value="{{ old('price') }}"
                                   placeholder="Masukkan Harga Product"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200">
                            @error('price')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">STOCK</label>
                            <input type="number" name="stock" value="{{ old('stock') }}"
                                   placeholder="Masukkan Stock Product"
                                   class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200">
                            @error('stock')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="inline-flex items-center justify-center px-4 py-2 rounded-lg
                                   bg-emerald-600 text-white text-sm font-semibold hover:bg-emerald-700 transition">
                        SAVE
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
        // inisialisasi rich text editor untuk textarea description (opsional)
        CKEDITOR.replace('description');
    </script>
</body>
</html>
