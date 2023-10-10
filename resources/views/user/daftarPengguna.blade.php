<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>
{{-- 6706220055_Kevin Sianturi_4604 --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Nama Lengkap
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Username
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Alamat
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Agama
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Jenis Kelamin
                                </th>
                                <th class="px-6 py-3 bg-gray-50 dark:bg-gray-900 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Nomor Telepon
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($users as $daftarPengguna)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->fullname }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->username }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->address }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->agama }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->jenis_kelamin }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ $daftarPengguna->phoneNumber }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-left">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-500">Edit</a>
                                        <a href="{{ route('user.infoPengguna', $daftarPengguna) }}" class="text-green-600 hover:text-green-900 ml-2 dark:text-green-300 dark:hover:text-green-500">View</a>
                                        <a href="" class="text-red-600 hover:text-red-900 ml-2 dark:text-red-300 dark:hover:text-red-500">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>