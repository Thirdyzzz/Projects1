<nav x-data="{ open: false }" class="bg-gradient-to-l from-[#765898] to-[#2c3157]">

    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white hover:text-gray-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                
                @if (Auth::user()->usertype === 'client')                   
                    
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clientviewhistory')" :active="request()->routeIs('clientviewhistory')" class="text-white hover:text-gray-200 ">
                        {{ __('Billing History') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clientarchivedhistory')" :active="request()->routeIs('clientarchivedhistory')" class="text-white hover:text-gray-200 ">
                        {{ __('Archived History') }}
                    </x-nav-link>
                </div>
                @endif

                @can('user')              
                
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    
                
                <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                        
                            <button class="inline-flex items-center px-4 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-inherit hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                <div>Add Clients</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                            
                        </x-slot>
                    
                        <x-slot name="content">

                        <x-dropdown-link :href="route('useraddclient')">
                                {{ __('Add Client ') }}
                            </x-dropdown-link>                        

                            <x-dropdown-link :href="route('userclienttable')">
                                {{ __('Client Details') }}
                            </x-dropdown-link>

                          
                        </x-slot>
                    </x-dropdown>
                </div>
                
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                        
                            <button class="inline-flex items-center px-4 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-inherit hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                <div>File Actions</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                            
                        </x-slot>
                    
                        <x-slot name="content">

                        <x-dropdown-link :href="route('usertable')">
                                {{ __('File Details') }}
                            </x-dropdown-link>

                           

                            <x-dropdown-link :href="route('archivedfiletable')">
                            {{ __('Archive Details') }}
                            </x-dropdown-link>
                            
                        </x-slot>
                    </x-dropdown>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="https://calendar.google.com/calendar/u/0/r?fbclid=IwAR3Ezrp6AoIxfsD38HYKIJghNrpnIudx8svX20TeA_VIIZ7elWmVHMAaPM0" class="text-white hover:text-gray-200">
                        {{ __('Schedules') }}
                    </x-nav-link>
                </div>
                </div>
                @endcan

                @can('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white hover:text-gray-200 ">
                        {{ __('Register user') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="https://calendar.google.com/calendar/u/0/r?fbclid=IwAR3Ezrp6AoIxfsD38HYKIJghNrpnIudx8svX20TeA_VIIZ7elWmVHMAaPM0" class="text-white hover:text-gray-200">
                        {{ __('Set a schedule') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-inherit hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                            <div>View Details</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        
                    </x-slot>
                   
                    <x-slot name="content">
                        <x-dropdown-link :href="route('adminfiletable')">
                            {{ __('File Details') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('adminclienttable')">
                            {{ __('Client Details') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('adminusertable')">
                            {{ __('User Details') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('archivedfiletable')">
                            {{ __('Archive Details') }}
                        </x-dropdown-link>
                        
                        
                    </x-slot>
                </x-dropdown>
            </div>

            

          

            <!-- client actions -->
            <div class="hidden sm:flex sm:items-center sm:ml-1">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-inherit hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                            <div>Client Actions</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        
                    </x-slot>
                   
                    <x-slot name="content">                            

                            <x-dropdown-link :href="route('useraddclient')">
                                {{ __('Add Client') }}
                            </x-dropdown-link>                           
                        
                    </x-slot>
                </x-dropdown>
            </div>
            <!-- client actions end -->
            @endcan
            </div>

         

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-inherit hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->usertype }} | {{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
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
