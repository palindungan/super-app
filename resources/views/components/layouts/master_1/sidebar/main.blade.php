<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            {{--
            <a href="" class="logo">
                <img src="{{ asset('components/layouts/master_1/assets/img/kaiadmin/logo_light.svg') }}"
                    alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            --}}
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item @yield('sidebar.home.active')">
                    <a href="">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.cashier.active')">
                    <a href="">
                        <i class="fas fa-tv"></i>
                        <p>Kasir</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Laporan</h4>
                </li>
                <li class="nav-item @yield('sidebar.report.transactions.active')">
                    <a href="">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Transaksi</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Produk</h4>
                </li>
                <li class="nav-item @yield('sidebar.data_product.products.active')">
                    <a href="">
                        <i class="fas fa-shopping-basket"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.data_product.product_units.active')">
                    <a href="">
                        <i class="fas fa-balance-scale"></i>
                        <p>Satuan</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.data_product.product_categories.active')">
                    <a href="">
                        <i class="fas fa-th-large"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Master</h4>
                </li>
                <li class="nav-item @yield('sidebar.data_master.branches.active')">
                    <a href="">
                        <i class="fas fa-store-alt"></i>
                        <p>Cabang</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.data_master.users.active')">
                    <a href="">
                        <i class="fas fa-user-friends"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.data_master.customers.active')">
                    <a href="">
                        <i class="fas fa-address-card"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.data_master.currency_exchange_rates.active')">
                    <a href="">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Kurs Mata Uang</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Lain-Lain</h4>
                </li>
                <li class="nav-item @yield('sidebar.data_master.balances.active')">
                    <a href="">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Saldo</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Administrator</h4>
                </li>
                <li class="nav-item @yield('sidebar.administrator.companies.active')">
                    <a href="">
                        <i class="fas fa-building"></i>
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item @yield('sidebar.administrator.balances.active')">
                    <a href="">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Saldo</p>
                    </a>
                </li>
                @can('administrator-currencies.index')
                    <li class="nav-item @yield('sidebar.administrator.currencies.active')">
                        <a href="{{ route('administrator-currencies.index') }}">
                            <i class="fas fa-money-bill-wave-alt"></i>
                            <p>Mata Uang</p>
                        </a>
                    </li>
                @endcan
                @can('administrator-roles.index')
                    <li class="nav-item @yield('sidebar.administrator.roles.active')">
                        <a href="{{ route('administrator-roles.index') }}">
                            <i class="fas fa-user-shield"></i>
                            <p>Peran dan Izin</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
