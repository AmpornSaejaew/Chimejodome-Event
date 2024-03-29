<nav class="bg-white border-gray-200 py-6 flex justify-between px-20 text-kuGreen">
    <div class=" flex gap-14 justify-start items-center ">
        <a href="{{App\Providers\RouteServiceProvider::HOME}}" class="pr-15">
            {{-- <img src="http://localhost/kuLogo.png" class="h-7 w-auto pt-2 mr-3 sm:h-12" alt="Logo"> --}}
            <img src="{{env('APP_URL')."/".'kuLogo.png'}}" class="h-7 w-auto pt-2 mr-3 sm:h-12" alt="Logo">
        </a>
        <!-- <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 ml-4 sm:inline-block">
                <span>asd</span>

            </div>
        </div> -->

        <!-- {{-- <div>--}}
        {{-- <button data-collapse-toggle="mobile-menu-2" type="button"--}}
        {{-- class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"--}}
        {{-- aria-controls="mobile-menu-2" aria-expanded="true">--}}
        {{-- <span class="sr-only">Open main menu</span>--}}
        {{-- <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
        {{-- <path fill-rule="evenodd"--}}
        {{-- d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"--}}
        {{-- clip-rule="evenodd"></path>--}}
        {{-- </svg>--}}
        {{-- <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">--}}
        {{-- <path fill-rule="evenodd"--}}
        {{-- d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"--}}
        {{-- clip-rule="evenodd"></path>--}}
        {{-- </svg>--}}
        {{-- </button>--}}
        {{-- </div>--}} -->
        @if( Auth::check() )


           @if((Auth::user()->role) === 0)
           <span>
                <a href="{{route('EventsList')}}">Event List</a>
            </span>
            <span>
                <a href="{{route('UsersList')}}">User List</a>
            </span>
            <span>
                <a href="{{route('registerStaff')}}">Create Staff</a>
            </span>
            @elseif((Auth::user()->role) === 1)
            <span>
                <a href="{{route('needBudgetList')}}">Event List</a>
            </span>
            <span>
                <!-- <a href="{{route('events.joinList')}}">Join List</a> -->
            </span>
            @elseif((Auth::user())->role === 2)
            <span>
                <a href="{{route('events.index')}}">Event</a>
            </span>
            <span>
                <a href="{{route('events.joinList')}}">Join Event</a>
            </span>
                <span>
                <a  href="{{ route('events.manage') }}">
                    My Event
                </a>
                </span>
            <span><a  href="{{ route('events.portfolio') }}">
                portfolio
            </a></span>
                <span><a  href="{{ route('events.create') }}">
                    Create Event
                </a>
                </span>
            @endif

    </div>
    <div class="flex justify-center items-center" id="mobile-menu-2">
        <ul class="flex flex-col justify-center items-center mr-2 mt-4 font-medium lg:flex-row  lg:mt-0 ">

            <li class="p-5">
                <div>
                {{Auth::user()->name}}
                </div>
                <div class="text-xs">
                @if (Auth::user()->role === 0)
                        <p>Admin</p>
                        @elseif (Auth::user()->role === 1)
                        <p>Staff</p>
                        @elseif (Auth::user()->role === 2)
                        <p>Student</p>
                        @endif
                </div>
            </li>
            <li class="pr-3">
                <a href="{{ route('profile.index') }}">
                    {{-- <img src="http://localhost/{{Auth::user()->profile_image ? Auth::user()->profile_image : default_peson.jpeg}}" alt="" class="h-10 w-10 rounded-full"> --}}
                    <img src="{{ env('APP_URL')."/". Auth::user()->profile_image}}" class="h-10 w-10 rounded-full">
                </a>
            </li>
            <li class="flex justify-center items-center">
                <button id="dropdownDelayButton" data-dropdown-placement="right" data-dropdown-offset-skidding="110" data-dropdown-offset-distance="-40" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500" data-dropdown-trigger="hover" class="" type="button">
                    {{-- <img src="http://localhost/manuIcon1.png" alt="" class="h-10 w-10 "> --}}
                    <img src="{{env('APP_URL')."/".'manuIcon1.png'}}" alt="" class="h-10 w-10 ">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44  dark:bg-gray-700">
                    <ul class="py-2  text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('profile.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>


            </li>
            @else
            <div class="flex mr-5 gap-14">
                <a  href="{{route('login')}}">
                    <span>Login</span>
                </a>
                <a  href="{{route('register')}}">
                    <span>Register</span>
                </a>
            </div>

            @endif
        </ul>
    </div>




</nav>
