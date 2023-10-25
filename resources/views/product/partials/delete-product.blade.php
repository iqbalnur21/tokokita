<section class="space-y-6">

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-product')"
    >{{ __('Hapus Produk') }}</x-danger-button>

    <x-modal name="confirm-user-product" focusable>
        <form method="post" action="{{ route('product.destroy', $product) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Apakah Kamu Yakin Untuk Menghapus Produk ini?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Kamu Tidak Dapat Mengembalikan Produk yang Dihapus.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batalkan') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Hapus Produk') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
