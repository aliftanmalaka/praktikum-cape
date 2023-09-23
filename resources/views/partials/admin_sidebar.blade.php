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
                <a href="{{ route('admin.dashboard') }}"
                    class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Home</span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.kalender') }}"
                    class="navItem {{ $route == 'admin.kalender' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
                        <span>Kalender</span>
                    </span>
                </a>
            </li>

            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user-group"></iconify-icon>
                        <span>Organisasi</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.organisasi.index') }}"
                            class="{{ $route == 'admin.organisasi.index' ? 'active' : '' }}">Semua Organisasi</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.organisasi.create') }}"
                            class="{{ $route == 'admin.organisasi.create' ? 'active' : '' }}">Tambah Organisasi</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:archive-box"></iconify-icon>
                        <span>Ruangan</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.ruangan.index') }}"
                            class="{{ $route == 'admin.ruangan.index' ? 'active' : '' }}">Semua Ruangan</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.ruangan.create') }}"
                            class="{{ $route == 'admin.ruangan.create' ? 'active' : '' }}">Tambah Ruangan</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:archive-box"></iconify-icon>
                        <span>Peminjaman</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.peminjaman.index') }}"
                            class="{{ $route == 'admin.peminjaman.index' ? 'active' : '' }}">All Peminjaman</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.peminjaman.create') }}"
                            class="{{ $route == 'admin.peminjaman.create' ? 'active' : '' }}">Add Peminjaman</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:calendar"></iconify-icon>
                        <span>Kalender Tabel</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.kalender.index') }}"
                            class="{{ $route == 'admin.kalender.index' ? 'active' : '' }}">All Kalender Tabel</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.kalender.create') }}"
                            class="{{ $route == 'admin.kalender.create' ? 'active' : '' }}">Add kalender Tabel</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:lifebuoy"></iconify-icon>
                        <span>Berita</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.berita.index') }}"
                            class="{{ $route == 'admin.berita.index' ? 'active' : '' }}">All Berita</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.berita.create') }}"
                            class="{{ $route == 'admin.berita.create' ? 'active' : '' }}">Add Berita</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:view-boards"></iconify-icon>
                        <span>Galeri</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.galeri.index') }}"
                            class="{{ $route == 'admin.galeri.index' ? 'active' : '' }}">All Galeri</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.galeri.create') }}"
                            class="{{ $route == 'admin.galeri.create' ? 'active' : '' }}">Add Galeri</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:envelope"></iconify-icon>
                        <span>Saran</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.saran.index') }}"
                            class="{{ $route == 'admin.saran.index' ? 'active' : '' }}">All Saran</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.saran.create') }}"
                            class="{{ $route == 'admin.saran.create' ? 'active' : '' }}">Add Saran</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="{{ route('admin.mail.index') }}"
                    class="navItem {{ $route == 'admin.mail.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:inbox"></iconify-icon>
                        <span>Mail</span>
                    </span>
                </a>
            </li>

            <li class="sidebar-menu-title">User</li>
            <li class="">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>User</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li class="">
                        <a href="{{ route('admin.user.index') }}"
                            class="{{ $route == 'admin.user.index' ? 'active' : '' }}">All User</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.user.create') }}"
                            class="{{ $route == 'admin.user.create' ? 'active' : '' }}">Add User</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.user.archive') }}"
                            class="{{ $route == 'admin.user.archive' ? 'active' : '' }}">Archive</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ route('admin.log.index') }}"
                    class="navItem {{ $route == 'admin.log.index' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:user"></iconify-icon>
                        <span>Log</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
