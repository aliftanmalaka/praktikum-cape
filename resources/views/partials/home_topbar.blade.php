<!-- BEGIN: Header -->
<div class="z-[9]" id="app_header">
    <div
        class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                <a href="{{ url('/') }}" class="mobile-logo xl:hidden inline-block">
                    <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="black_logo" alt="logo">
                    <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="white_logo" alt="logo">
                </a>
                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                    <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button
                    class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1 rtl:space-x-reverse search-modal"
                    data-bs-toggle="modal" data-bs-target="#searchModal">
                    <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                    <span class="xl:inline-block hidden ml-3">Search... </span>
                </button>
            </div>
            <!-- end vertcial -->
            <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="{{ url('/') }}">
                    <span class="xl:inline-block hidden">
                        <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="black_logo" alt="logo">
                        <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="white_logo" alt="logo">
                    </span>
                    <span class="xl:hidden inline-block">
                        <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="black_logo" alt="logo">
                        <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="white_logo"
                            alt="logo">
                    </span>
                </a>
                <button class="smallDeviceMenuController open-sdiebar-controller xl:hidden inline-block">
                    <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
            </div>
            <!-- end horizental -->

            <div class="main-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.index') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:home">
                                    </iconify-icon>
                                </span> --}}
                                <div class="text-box">{{ __('home.title.index') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.profil') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:calendar">
                                    </iconify-icon>
                                </span> --}}
                                <div class="text-box">{{ __('home.title.profil') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.berita') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:calendar">
                                    </iconify-icon>
                                </span> --}}
                                <div class="text-box">{{ __('home.title.berita') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.galeri') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:calendar">
                                    </iconify-icon> --}}
                                </span>
                                <div class="text-box">{{ __('home.title.galeri') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.kalender') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:calendar">
                                    </iconify-icon> --}}
                                </span>
                                <div class="text-box">{{ __('home.title.kalender') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.ruangan') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:archive-box">
                                    </iconify-icon> --}}
                                </span>
                                <div class="text-box">{{ __('home.title.ruangan') }}</div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home.saran') }}">
                            <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                                {{-- <span class="icon-box">
                                    <iconify-icon icon="heroicons-outline:envelope">
                                    </iconify-icon> --}}
                                </span>
                                <div class="text-box">{{ __('home.title.saran') }}</div>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>
            <!-- end top menu -->
            <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">
                <!-- BEGIN: Language Dropdown  -->

                <div class="relative">
                    <button
                        class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center inline-flex items-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <iconify-icon icon="circle-flags:{{ App::getLocale() }}"
                            class="mr-0 md:mr-2 rtl:ml-2 text-xl">
                        </iconify-icon>
                    </button>
                    <!-- Language Dropdown menu -->
                    <div
                        class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md overflow-hidden">
                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ route('lang', $lang) }}"
                                            class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            <iconify-icon icon="circle-flags:{{ $lang }}"
                                                class="ltr:mr-2 rtl:ml-2 text-xl">
                                            </iconify-icon>
                                            <span class="font-medium">{{ $language }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Theme Changer -->
                <!-- END: Language Dropdown -->

                <!-- BEGIN: Toggle Theme -->
                <div>
                    <button id="themeMood"
                        class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                        <iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon"
                            icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
                        <iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon"
                            icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
                    </button>
                </div>
                <!-- END: TOggle Theme -->

                <!-- BEGIN: gray-scale Dropdown -->
                <div>
                    <button id="grayScale"
                        class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                        <iconify-icon class="text-slate-800 dark:text-white text-xl"
                            icon="mdi:paint-outline"></iconify-icon>
                    </button>
                </div>
                <!-- END: gray-scale Dropdown -->

                <!-- BEGIN: Message Dropdown -->
                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                @auth
                    <div class="md:block hidden w-full">
                        <button
                            class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center inline-flex items-center"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                                <img src="{{ Storage::url(auth()->user()->profile_photo) }}" alt="user"
                                    class="block w-full h-full object-cover rounded-full">
                            </div>
                            <span
                                class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">
                                {{ auth()->user()->name }}
                            </span>
                            <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]"
                                aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden">
                            <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                        <iconify-icon icon="heroicons-outline:home"
                                            class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                        </iconify-icon>
                                        <span class="font-Inter">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.edit') }}"
                                        class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                        <iconify-icon icon="heroicons-outline:user"
                                            class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                        </iconify-icon>
                                        <span class="font-Inter">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <div
                                            class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal">
                                            <button class="font-Inter" type="submit">
                                                <iconify-icon icon="heroicons-outline:login"
                                                    class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                </iconify-icon>
                                                Logout
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <button class="btn inline-flex justify-center btn-dark"><a href="{{ route('login') }}">Login</a></button>
                @endauth
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                    <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
            </div>
            <!-- end nav tools -->
        </div>
    </div>
</div>
