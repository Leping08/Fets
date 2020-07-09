<footer class="bg-indigo-600 text-white bottom-0 w-full bottom-0 p-2">
    <div class="flex mx-auto sm:px-4 md:px-8 lg:px-12 sm:py-2  align-middle items-center">
        <a href="{{ url('/') }}" class="mr-6 flex-auto items-center">
            <span class="flex-1 text-2xl font-semibold text-white no-underline italic">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <div class="flex-auto italic text-center text-gray-200 inline-block">
            Copyright © {{ now()->year}} {{ config('app.name', 'Laravel') }}
        </div>

        @php
        $navItems = [
            [
                'route' => 'dashboard',
                'text' => 'Dashboard'
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
