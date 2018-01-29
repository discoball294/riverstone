<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixe " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item{{ Route::is('admin-index') ? 'active open' : '' }}">
                <a href="{{ route('admin-index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>

            </li>
            <li class="nav-item {{ Route::is('pengumuman.index') || Route::is('pengumuman.create') ||   Route::is('pengumuman.edit') ? 'active open' : '' }}">
                <a href="{{ route('pengumuman.index') }}" class="nav-link nav-toggle">
                    <i class="icon-info"></i>
                    <span class="title">Pengumuman</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('kode-promo.index') || Route::is('kode-promo.create') ||   Route::is('kode-promo.edit') ? 'active open' : '' }}">
                <a href="{{ route('kode-promo.index') }}" class="nav-link nav-toggle">
                    <i class="icon-tag"></i>
                    <span class="title">Kode Promo</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('banner.*') ? 'active open' : '' }}">
                <a href="{{ route('banner.edit', 1) }}" class="nav-link nav-toggle">
                    <i class="icon-picture"></i>
                    <span class="title">Banner</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('restaurant.*') ? 'active open' : '' }}">
                <a href="{{ route('restaurant.edit', 1) }}" class="nav-link nav-toggle">
                    <i class="icon-cup"></i>
                    <span class="title">Restaurant</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('layanan.*') ? 'active open' : '' }}">
                <a href="{{ route('layanan.index') }}" class="nav-link nav-toggle">
                    <i class="icon-notebook"></i>
                    <span class="title">Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('admin-reservation') ? 'active open' : '' }}">
                <a href="{{ route('admin-reservation') }}" class="nav-link nav-toggle">
                    <i class="icon-calendar"></i>
                    <span class="title">Reservasi</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('contact.*') ? 'active open' : '' }}">
                <a href="{{ route('contact.index') }}" class="nav-link nav-toggle">
                    <i class="icon-call-end"></i>
                    <span class="title">Contact</span>
                </a>
            </li>
            <li class="nav-item {{ Route::is('rooms.*') || Route::is('room-categories.*') || Route::is('fasilitas.*') ? 'active open' : '' }}">
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-directions"></i>
                    <span class="title">Hotel</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ Route::is('rooms.*') ? 'active open' : '' }}">
                        <a href="{{ route('rooms.index') }}" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Kamar</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Route::is('room-categories.*') ? 'active open' : '' }}">
                        <a href="{{ route('room-categories.index') }}" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Tipe Kamar</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ Route::is('fasilitas.*') ? 'active open' : '' }}">
                        <a href="{{ route('fasilitas.index') }}" class="nav-link ">
                            <i class="icon-equalizer"></i>
                            <span class="title">Fasilitas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ Route::is('laporan') ? 'active open' : '' }}">
                <a href="{{ route('laporan') }}" class="nav-link nav-toggle">
                    <i class="icon-doc"></i>
                    <span class="title">Laporan</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>