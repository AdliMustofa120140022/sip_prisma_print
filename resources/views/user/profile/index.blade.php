<x-guest-layout>
    <x-slot name="title">
        Profil
    </x-slot>

    <x-slot name="head">

    </x-slot>

    <div class=" w-full">
        <div class="flex gap-3 items-center">
            <a href="{{ url()->previous() }}">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">profil</h2>
        </div>

        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-center">

                <div
                    class="profile bg-gray-50 rounded-full text-center border border-gray-300 aspect-square p-8 inline-block">
                    <i class="fa-solid fa-user text-5xl  text-gray-500"></i>
                </div>
            </div>



            <form class="space-y-4 px-20" action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        value="{{ $user->name }}">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        value="{{ $user->email }}">
                </div>

                {{-- <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No Hp</label>
                    <input type="tel" id="phone" name="phone"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        value="{{$user->}}">
                </div> --}}

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-500"
                        placeholder="Password">
                </div>

                <div>
                    <button type="submit"
                        class="w-full mt-10 bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Ubah</button>
                </div>
            </form>
        </div>

    </div>

    <x-slot name="scripts">

    </x-slot>

</x-guest-layout>
