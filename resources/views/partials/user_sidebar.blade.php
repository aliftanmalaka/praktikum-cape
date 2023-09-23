<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ url('/') }}">
            <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="black_logo" alt="logo">
            <img src="{{ asset('backend/images/logo/logo-batu.svg') }}" class="white_logo" alt="logo">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Bagian Umum</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        @php
            $route = Route::currentRouteName();
        @endphp
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">HOME</li>
            <li class="">
                <a href="{{ route('user.dashboard') }}"
                    class="navItem {{ $route == 'user.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('navbar.home') }}</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('user.kalender') }}"
                    class="navItem {{ $route == 'user.kalender' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
                        <span>{{ __('navbar.calendar-grid') }}</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('user.kalender.index') }}"
                    class="navItem {{ $route == 'user.kalender.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
                        <span>{{ __('navbar.kalender-table') }}</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:inbox"></iconify-icon>
                        <span>{{ __('navbar.peminjaman') }}</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('user.peminjaman.index') }}"
                            class="{{ $route == 'user.peminjaman.index' ? 'active' : '' }}">{{ __('peminjaman.title.index') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ route('user.peminjaman.create') }}"
                            class="{{ $route == 'user.peminjaman.create' ? 'active' : '' }}">{{ __('peminjaman.title.create') }}</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:envelope"></iconify-icon>
                        <span>{{ __('navbar.saran') }}</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('user.saran.index') }}"
                            class="{{ $route == 'user.saran.index' ? 'active' : '' }}">{{ __('saran.title.index') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ route('user.saran.create') }}"
                            class="{{ $route == 'user.saran.create' ? 'active' : '' }}">{{ __('saran.title.create') }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
