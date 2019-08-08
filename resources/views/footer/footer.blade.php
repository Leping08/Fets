<footer class="bg-indigo-800 text-white bottom-0 w-full bottom-0 p-4">
    <div class="flex mx-auto sm:px-4 md:px-8 lg:px-12 sm:py-2 md:py-4 lg:py-6  align-middle items-center">
        <a href="{{ url('/') }}" class="mr-6 flex-auto items-center">
            <img src="/img/icons/wattch_icon_teal.png" class="flex-1" alt="" style="max-width: 15%;">
            <span class="flex-1 text-2xl font-semibold text-white no-underline italic">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <div class="flex-auto italic text-center text-gray-200 inline-block">
            Copyright © {{ now()->year}} {{ config('app.name', 'Laravel') }}
        </div>

        @php
        $navItems = [
            [
                'route' => 'about',
                'text' => 'About'
            ],
            [
                'route' => 'contact-us',
                'text' => 'Contact Us'
            ],
            [
                'route' => 'privacy-policy',
                'text' => 'Privacy Policy'
            ]
        ]
        @endphp

        <div class="flex-auto text-right text-gray-200">
            <ul class="">
                @foreach($navItems as $key => $item)
                    <li class="p-1">
                        <a class="" href="{{ route($item['route']) }}">{{ $item['text'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
