<nav :class="{'bg-background-light': !darkMode, 'bg-background-dark': darkMode}" class="border-b dark:border-gray-700" x-data="{ isMenuOpen: localStorage.getItem('isMenuOpen') === 'true' || false }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a class="font-semibold text-text-light dark:text-text-dark">
                        EasyEats
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline ml-10 space-x-4">
                        <a href="{{ route('recipes.index') }}" class="px-3 py-2 text-sm font-medium rounded-md cursor-pointer text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Recipes</a>
                        <a href="{{ route('ingredients.index') }}" class="px-3 py-2 text-sm font-medium rounded-md cursor-pointer text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Ingredients</a>
                        <a href="{{ route('restaurants.index') }}" class="px-3 py-2 text-sm font-medium rounded-md cursor-pointer text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Restaurants</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="flex items-center ml-4 md:ml-6 gap-x-4 md:gap-x-6">
                    @auth
                        <div class="relative ml-3">
                            <div>
                                <button type="button" class="flex items-center max-w-xs text-sm rounded-full bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-primary-dark" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="">
                                </button>
                            </div>
                            <div class="absolute right-0 w-48 py-1 mt-2 origin-top-right rounded-md shadow-lg bg-background-light ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-background-dark dark:ring-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                @can('admin')
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-text-light dark:text-text-dark hover:bg-primary-light hover:text-white dark:hover:bg-primary-dark" role="menuitem" tabindex="-1" id="user-menu-item-1">Manage</a>
                                @endcan
                                <form method="POST" x-data>
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-text-light dark:text-text-dark hover:bg-primary-light hover:text-white dark:hover:bg-primary-dark" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Sign out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a class="px-3 py-2 text-sm font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Sign In</a>
                    @endauth
                    <button
                        x-on:click="darkMode = !darkMode"
                        class="hidden p-2 text-white rounded-lg bg-primary hover:bg-primary-light md:flex dark:hover:bg-primary-dark"
                    >
                        <x-icons.themes.moon x-show="!darkMode" />
                        <x-icons.themes.sun x-show="darkMode" />
                    </button>
                </div>
            </div>
            <div class="flex -mr-2 md:hidden" x-on:click="isMenuOpen = !isMenuOpen">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-text-light hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:text-text-dark dark:hover:bg-primary-dark" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:hidden" id="mobile-menu" x-show="isMenuOpen" x-transition>
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a class="block px-3 py-2 text-base font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Recipes</a>
            <a class="block px-3 py-2 text-base font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Ingredients</a>
            <a class="block px-3 py-2 text-base font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Restaurants</a>
        </div>
        @auth
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-text-light dark:text-text-dark">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="px-2 mt-3 space-y-1">
                    @can('admin')
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-base font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Manage</a>
                    @endcan
                    <form method="POST" x-data>
                        @csrf
                        <button type="submit" class="block w-full px-3 py-2 text-base font-medium text-left rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark" @click.prevent="$root.submit();">Sign out</button>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="px-2 space-y-1">
                    <a class="block px-3 py-2 text-base font-medium rounded-md text-text-light dark:text-text-dark hover:bg-primary hover:text-white dark:hover:bg-primary-dark">Sign In</a>
                </div>
            </div>
        @endauth
        <button
            x-on:click="darkMode = !darkMode"
            class="p-2 text-white rounded-lg md:hidden ml-2 mb-3 bg-primary hover:bg-primary-light dark:hover:bg-primary-dark"
        >
            <x-icons.themes.moon x-show="!darkMode" />
            <x-icons.themes.sun x-show="darkMode" />
        </button>
    </div>
</nav>
