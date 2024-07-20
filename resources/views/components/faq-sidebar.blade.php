<aside class="w-5/12">
    <div class="menu pb-4">
        @foreach ($menus as $menu)
            <h3 class="font-bold text-3xl pb-2 ">{{ $menu['section'] }}</h3>
            <ul class="mb-5">
                @foreach ($menu['questions'] as $item)
                    <li class=" py-2 ps-5 border-s-4 border-black hover:text-blue-500 hover:border-blue-500">
                        <a href="{{ route('guest.faq', ['q' => $item['param']]) }}"
                            class="">{{ $item['question'] }}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach

    </div>
</aside>
