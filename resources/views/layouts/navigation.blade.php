<nav class="fixed top-0 w-full z-50 backdrop-blur bg-gradient-to-r from-red-400 via-yellow-200 to-red-300 dark:from-gray-800 dark:to-gray-900 border-b border-gray-200 dark:border-gray-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4  py-3 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}">


            <img src="{{ asset('images/2.jpg') }}" class="w-12 h-12 rounded-full shadow-lg shrink-0 animate-pulse">
            </a>

            <span class="hidden sm:inline text-lg md:text-2xl font-extrabold text-red-700 dark:text-yellow-400 tracking-wide">
                محطة جالو
            </span>
        </div>

        <!-- Desktop Links -->
        <div class="hidden sm:flex items-center gap-4">

            @auth
                <!-- Admin Links -->
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('stations.index') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-red-500 hover:bg-red-600 shadow-md hover:scale-105 transition-transform">
                        🏭 المحطات
                    </a>
                      {{-- <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود جديد
                    </a> --}}
                    <a href="{{ route('fuel') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-yellow-500 hover:bg-yellow-600 shadow-md hover:scale-105 transition-transform">
                        📊 التقارير
                    </a>
                      <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-teal-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود
                    </a>
                         <a href="{{ route('vehicles.index') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                         اكواد تم صرفهم
                    </a>
                        <a href="{{ route('vehicles.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 shadow-md hover:scale-105 transition-transform">
                        ⛽  بيانات مطلوبة 
                    </a>
                @endif

                <!-- Employee Links -->
                @if(auth()->user()->role === 'employee')
                
                 
                  
                    {{-- <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود جديد
                    </a> --}}
                    <a href="{{ route('fuel') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-yellow-500 hover:bg-yellow-600 shadow-md hover:scale-105 transition-transform">
                        📊 التقارير
                    </a>
                      <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-teal-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود
                    </a>
                         <a href="{{ route('vehicles.index') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                         اكواد تم صرفهم
                    </a>
                        <a href="{{ route('vehicles.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 shadow-md hover:scale-105 transition-transform">
                        ⛽  بيانات مطلوبة 
                    </a>
                @endif

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="px-4 py-2 rounded-lg font-semibold text-white bg-gray-700 hover:bg-gray-800 shadow-md hover:scale-105 transition-transform">
                        تسجيل الخروج
                    </a>
                </form>
            @endauth

            <!-- Guest Links -->

            <!-- Theme Toggle -->
            <button id="theme-toggle" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-yellow-300 shadow-lg hover:scale-110 transition-transform">
                🌙
            </button>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="sm:hidden w-12 h-12 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white shadow-lg hover:scale-110 transition-transform">
            ☰
        </button>

    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden sm:hidden bg-gradient-to-b from-red-100 via-yellow-50 to-red-200 dark:from-gray-900 dark:to-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="flex flex-col gap-3 p-4">

            @auth
                @if(auth()->user()->role === 'admin')
          <a href="{{ route('stations.index') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-red-500 hover:bg-red-600 shadow-md hover:scale-105 transition-transform">
                        🏭 المحطات
                    </a>
                      {{-- <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود جديد
                    </a> --}}
                    <a href="{{ route('fuel') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-yellow-500 hover:bg-yellow-600 shadow-md hover:scale-105 transition-transform">
                        📊 التقارير
                    </a>
                      <a href="{{ route('fuel.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-teal-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                        ⛽ تعبئة الوقود
                    </a>
                         <a href="{{ route('vehicles.index') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition-transform">
                         اكواد تم صرفهم
                    </a>
                        <a href="{{ route('vehicles.create') }}" class="px-4 py-2 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 shadow-md hover:scale-105 transition-transform">
                        ⛽  بيانات مطلوبة 
                    </a>
                @endif

                @if(auth()->user()->role === 'employee')
                    <a href="{{ route('vehicles.index') }}" class="py-2 px-3 rounded-lg font-semibold text-white bg-blue-500 hover:bg-blue-600 shadow-md hover:scale-105 transition">⛽ السيارات</a>
                    <a href="{{ route('fuel') }}" class="py-2 px-3 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition">⛽ تعبئة الوقود</a>
                    <a href="{{ route('fuel.create') }}" class="py-2 px-3 rounded-lg font-semibold text-white bg-green-500 hover:bg-green-600 shadow-md hover:scale-105 transition">⛽ تعبئة الوقود جديد</a>
                    <a href="{{ route('fuel') }}" class="py-2 px-3 rounded-lg font-semibold text-white bg-yellow-500 hover:bg-yellow-600 shadow-md hover:scale-105 transition">📊 التقارير</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); this.closest('form').submit();"
                       class="py-2 px-3 rounded-lg font-semibold text-white bg-gray-700 hover:bg-gray-800 shadow-md hover:scale-105 transition">
                        تسجيل الخروج
                    </a>
                </form>
            @endauth

            <!-- Mobile Theme Toggle -->
            <button id="theme-toggle-mobile" class="w-full py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-yellow-300 shadow-md hover:scale-105 transition">
                🌙 تغيير الوضع
            </button>
        </div>
    </div>
</nav>
