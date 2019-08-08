<nav class="bg-white shadow mb-8 p-4">
    <div class="mx-auto sm:px-4 md:px-8 lg:px-12">
        <div class="flex items-center justify-center">
            <div class="mr-6">
                <div>
                    <a href="{{ route('home') }}"><img alt="" style="height: 50px;" src="/img/fets.png"></a>
                </div>
            </div>
            <div class="flex-1 text-right">
                @guest
                    <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline text-gray-900 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a href="{{ route('dashboard') }}" class="no-underline hover:underline text-gray-900 text-sm pr-4">Dashboard</a>

                    <a href="{{ route('profile') }}" class="no-underline hover:underline text-gray-900 text-sm pr-4">{{ Auth::user()->name }}</a>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-gray-900 text-sm p-3"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
