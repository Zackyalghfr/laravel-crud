    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <h4 class="text-lg font-semibold text-gray-900">Detail Product</h4>
                    <a href="{{ route('products.index') }}"
                       class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800 transition">
                        BACK
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <div class="md:col-span-4">
                        <div class="border border-gray-200 rounded-2xl overflow-hidden">
                            <img
                                src="{{ asset('/storage/product/'.$product->image) }}"
                                class="w-full"
                                alt="{{ $product->title }}"
                            >
                        </div>
                    </div>

                    <div class="md:col-span-8">
                        <div class="border border-gray-200 rounded-2xl p-6">
                            <h3 class="text-xl font-bold text-gray-900">{{ $product->title }}</h3>
                            <hr class="my-4 border-gray-200">

                            <p class="text-gray-700 font-semibold">
                                {{ "Rp " . number_format($product->price,2,',','.') }}
                            </p>

                            <div class="mt-4">
                                <div class="text-sm font-semibold text-gray-700 mb-2">DESCRIPTION</div>
                                <div class="prose max-w-none text-gray-700">
                                    {!! $product->description !!}
                                </div>
                            </div>

                            <hr class="my-4 border-gray-200">

                            <p class="text-gray-700">
                                Stock : <span class="font-semibold">{{ $product->stock }}</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
