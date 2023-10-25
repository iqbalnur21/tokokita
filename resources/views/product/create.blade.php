<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-4 flex">
            <p class="font-semibold text-xl">Tambah Produk</p>
        </div>
        <div class="mt-4" x-data="{ imageUrl: '/storage/noimage.png' }">
            <form action="{{ route('product.store') }}" method="post" class="flex gap-8" enctype="multipart/form-data">
                @csrf
                <div class="w-1/2">
                    <img :src="imageUrl" alt="">
                </div>
                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Nama')" />
                        <x-text-input id="image" class="block mt-1 w-full border p-2" type="file" name="image"
                            :value="old('image')" @change="imageUrl = URL.createObjectURL($event.target.files[0])" accept="image/*" required />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nama')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Harga')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                            :value="old('price')" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Deskripsi')" />
                        <x-text-area id="description" class="block mt-1 w-full" type="text"
                            name="description">{{ old('description') }}</x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Tambah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
