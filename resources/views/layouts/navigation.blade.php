<style>
    /* Ensure that the menu is hidden initially */
    .dropdown-content {
        display: none;
    }

    /* Show the menu when the parent is hovered */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Define the keyframe animation */
    @keyframes backgroundExpand {
        from {
            background-size: 100%;
            background-image: linear-gradient(to right, #5ac7f1, #77ddf7);
        }

        to {
            background-size: 0;
            background-image: linear-gradient(to right, #a9d2e2, #25434b);
        }
    }

    /* Apply the animation to the a tags when hovered */
    .dropdown-content a:hover {
        animation: backgroundExpand 0.5s backwards;
        background-image: linear-gradient(to right, #5ac7f1, #77ddf7);
        background-repeat: no-repeat;
        background-size: 0;
        border-radius: 4px;
    }

    /* Reset the background for a tags */
    .dropdown-content a {
        background: none;
    }
</style>

<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-black dark:text-white " :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <div class="z-50 relative inline-block my-auto text-left dropdown">
                        <x-nav-link class="text-black dark:text-white cursor-pointer" {{-- :href="route('categories')" :active="request()->routeIs('dashboard')" --}}>
                            {{ __('Categories') }}
                        </x-nav-link>
                        <div
                            class="dropdown-content origin-top-right absolute w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Football</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Basketball</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Cricket</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Table Tennis</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Volleyball</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Javelin Throw</a>
                            <a class="block transition delay-100 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                href="#">Others</a>
                        </div>
                    </div>

                    <x-nav-link class="text-black dark:text-white"{{-- :href="route('aboutus')" :active="request()->routeIs('dashboard')" --}}>
                        {{ __('About Us') }}
                    </x-nav-link>

                    <x-nav-link class="text-black dark:text-white" {{-- :href="route('customer_diaries')" :active="request()->routeIs('dashboard')" --}}>
                        {{ __('Customer Diaries') }}
                    </x-nav-link>

                    <x-nav-link class="text-black dark:text-white" {{-- :href="route('contactus')" :active="request()->routeIs('dashboard')" --}}>
                        {{ __('Contact Us') }}
                    </x-nav-link>
                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div><img src="{{ Auth::user()->image }}" alt="Users Image" width="20px" height="20px">
                            </div>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                    @click="open = ! open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="hidden sm:hidden" :class="{ 'block': open, 'hidden': !open }">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200"><img class="inline"
                        src="{{ Auth::user()->image }}" alt="Users Image" width="20px" height="20px">
                    {{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
