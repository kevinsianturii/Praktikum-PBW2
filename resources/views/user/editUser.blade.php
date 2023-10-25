<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('infoPengguna') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('user.editUpdate', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" class="text-black" readonly value="{{$user->id}}" name="id">
                    <div class="flex flex-col space-y-4">
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600">
                                <div><input type="text" name="fullname" value="{{ $user->fullname }}" class="bg-slate-500 border rounded-md p-1"></div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Email</div>
                            <div><input type="email" name="email" value="{{ $user->email }}" class="text-black bg-slate-588 border rounded-md p-1"></div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600">
                                <div>{{ $user->username }}</div>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Address</div>
                            <div><textarea name="address" class="bg-slate-500 border rounded-md p-1">{{ $user->address }}</textarea></div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Birthdate</div>
                            <div><input type="date" name="birtdate" value="{{ $user->birtdate }}" class="bg-slate-500 border rounded-md p-1"></div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Phone Number</div>
                            <div><input type="text" name="phoneNumber" value="{{ $user->phoneNumber }}" class="bg-slate-500 border rounded-md p-1"></div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Religion</div>
                            <div>: {{ $user->agama }}</div>
                        </div>
                        <div class="flex items-start">
                            <div class="font-medium text-gray-600 dark:text-gray-480 w-1/4">Gender</div>
                            <div>
                                @if($user->jenis_kelamin == 'Pria')
                                    <span>: Pria</span>
                                @else
                                    <span>: Wanita</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a onclick="window.history.back()" class="underline text-sm text-gray-600 dark:text-gray-488 w-1/4">Back To daftar pengguna</a>
                        <div class="text-gray-600 dark:text-gray-480 w-1/4">Full Name</div>
                        <div class="text-gray-600 dark:text-gray-480 w-1/4">Username</div>
                    </div>

                    <x-primary-button class="ml-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>