<nav class="sticky top-0 z-10">
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <div class="flex flex-row justify-between px-10 py-2 bg-[#577399]">
        <div class="w-64">
            <a href="{{ url('/') }}"><img class="w-100" src="{{ asset('img/logonav.png')}}" alt="Logo"></a>
        </div>
        <div class="w-50 flex flex-row gap-7 align-middle justify-center px-10 py-3">
            <a href="/beranda/favorite">
                <img class="w-8" src="{{ asset('img/love.png') }}" alt="Love">
            </a>
            <a href="/beranda/keranjang">
                <img class="w-8" src="{{ asset('img/cart.png') }}" alt="Cart">
            </a>
            <a href="/contact">
                <img class="w-8" src="{{ asset('img/contact.png') }}" alt="Contact">
            </a>
            @auth
                <span class="text-[#FE5F55] font-bold font-roboto-condensed text-3xl">
                    {{ Str::limit(Auth::user()->name, 8) }}
                </span>
                <div class="relative inline-block text-left dropdown">
                    <a href="#" class="flex items-center">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('img/user.png') }}" alt="User">
                    </a>
                
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg dropdown-content">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="text-[#FE5F55] font-bold font-roboto-condensed text-3xl">
                    Login
                </a>
            @endguest
        </div>
    </div>
</nav>
