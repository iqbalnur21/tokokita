<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-4 flex justify-between item-center">
            <p class="font-semibold text-xl">Edit Produk</p>
            @include('product.partials.delete-product')
        </div>
        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->image }}' }">
            <form action="{{ route('product.update', $product->id) }}" method="post" class="flex gap-8"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="w-1/2">
                    <img :src="imageUrl" alt="">
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Nama')" />
                        <x-text-input id="image" class="block mt-1 w-full border p-2" type="file" name="image"
                            :value="$product->image" @change="imageUrl = URL.createObjectURL($event.target.files[0])"
                            accept="image/*" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="$product->name" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Harga')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                            :value="$product->price" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <x-text-area id="description" class="block mt-1 w-full" type="text"
                            name="description">{{ $product->description }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Edit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
