<x-guest-layout>

    <section class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="sectio"></div>
        <h3>ini home update</h3>
        @if (Auth::user())
            <h1>{{ Auth::user()->name }}</h1>
            <h1>{{ Auth::user()->role }}</h1>
            <a href="{{ route('logout') }}">Logout</a>
        @else
            <h1>Anda belum login</h1>
            <a href="{{ route('login') }}">Login</a>
        @endif
    </section>
</x-guest-layout>
