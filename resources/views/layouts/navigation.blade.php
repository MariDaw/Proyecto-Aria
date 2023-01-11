<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-0 sm:px-0 lg:px-0 bg-red-200">
        <div class="flex justify-between h-32">
            <div class="flex">
                <!-- Primary Navigation Menu -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current" />
                    </a>
                </div>
                <!-- Logo -->


            </div>
        </div>
        <!-- Navigation Links -->
        <div class="hidden w-full space-x-0 sm:-my-px  sm:flex " style="background-color: WHITE;">
            <div class="w-52 py-2 px-3" style="background-color: #2bce90d0; display:flex; justify-content:center; align-items:center;">
                <x-nav-link :href="route('dashboard')" >
                    <img class="flex ml-12 hover:scale-110" src="{{url('../img/hogar.png') }}" alt="Home">
                </x-nav-link>
            </div>
            <div class="w-52 py-2 px-3" style="background-color: #7283E1; display:flex; justify-content:center; align-items:center;">
                <x-nav-link :href="route('publicaciones.index')" :active="request()->routeIs('publicaciones.index')">
                    <img class="flex ml-12 hover:scale-110" src="{{url('../img/brujula.png') }}" alt="Publicaciones">
                </x-nav-link>
            </div>
            <div class="bg-yellow-200 w-52 py-2 px-3" style="background-color: #fcde468a; display:flex; justify-content:center; align-items:center; ">
            <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.index')">
                <img class="flex ml-12 hover:scale-110" src="{{url('../img/shop.png') }}" alt="Tienda">
            </x-nav-link>
            </div>
            <div class="bg-blue-400 w-52 py-2 px-3" style="background-color: #FF0505; display:flex; justify-content:center; align-items:center;">
            <x-nav-link :href="route('carritos.index')" :active="request()->routeIs('carritos.index')">
                <img class="flex ml-12 hover:scale-110" src="{{url('../img/carrito.png') }}" alt="Carrito" > ({{ Auth::user()->carritos()->sum('cantidad') }})
            </x-nav-link>

            </div>

            <div class="bg-green-300 w-52 py-2 px-3" style="background-color: #7283E1; display:flex; justify-content:center; align-items:center;">
            <x-nav-link :href="route('perfil.index')" :active="request()->routeIs('perfil.index')">
                <img class="flex ml-12 hover:scale-110" src="{{url('../img/user.png') }}" alt="Perfil" >
            </x-nav-link>
            </div>
            <div class="flex justify-center">
                <div class="mb-3 py-6 xl:w-86 ml-96 mt-4">
                  <input
                    type="search"
                    class="form-control
                      block
                      w-full
                      px-3
                      py-10
                      text-base
                      font-normal
                      text-gray-700
                      bg-white bg-clip-padding
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      hidden
                      m-0
                      focus:text-gray-700 focus:bg-white focus:border-red-500 focus:outline-none
                    "
                    id="exampleSearch"
                    placeholder="Search"
                  />
                </div>
                {{-- <div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Change Language
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">English</a>
                          <a class="dropdown-item" href="#">Spanish</a>
                        </div>
                      </div>
                </div> --}}
              </div>




            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('perfil.index')" :active="request()->routeIs('perfil.index')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
    </div>
</nav>
