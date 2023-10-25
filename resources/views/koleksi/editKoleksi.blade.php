{{-- 6706220055-Kevin Sianturi-4604 --}}
<x-guest-layout>
    <form method="POST" action="{{ route('koleksi.updateKoleksi', $collection->id) }}">
        @csrf
        <input type="text" readonly name="id" value="{{$collection->id}}">
        <x-text-input id="namakoleksi" class="block mt-1 w-full" type="text" name="namakoleksi" :value="$collection->namakoleksi" required autocomplete="name" />
        <x-text-input id="jenisKoleksi" class="block mt-1 w-full" type="text" name="jenisKoleksi" :value="$collection->jeniskoleksi" required autocomplete="jenisKoleksi" />
        <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="text" name="jumlahkoleksi" :value="$collection->jumlahKoleksi" required autocomplete="jumlahKoleksi" />
        <div class="flex items-center justify-end mt-4">
            <a onclick="" class="underline text-sm text-gray-600 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800" href="{{ route('koleksi.daftarKoleksi') }}">
                {{ __('Back To daftar Koleksi') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
