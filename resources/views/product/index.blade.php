<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        @if (session()->has('success'))
            <x-alert message='{{session("success")}}'/>
        @endif
        <div class="mt-4 flex items-center justify-between">
            <p class="font-semibold text-xl">Produk Kami</p>
            <a href="{{ route('product.create') }}">
                <button class="bg-gray-200 px-10 py-2 rounded-md font-semibold">Tambah</button>
            </a>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 mt-6 gap-6">
            @foreach ($products as $product)
                <div>
                    <img src="{{ url('storage/' . $product->image) }}" class="h-96 w-full object-cover">
                    <div class="my-2">
                        <p class="text-xl font-light">{{ $product->name }}</p>
                        <p class="font-semibold text-gray-400">Rp. {{ number_format($product->price) }}</p>
                    </div>
                    <a href="{{ route('product.edit', $product) }}">
                        <button class="bg-gray-200 px-10 py-2 w-full rounded-md font-semibold">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
