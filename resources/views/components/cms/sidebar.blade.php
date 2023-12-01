<aside class="sidebar border-end shadow">
    <div class="sidebar-header d-flex align-items-center justify-content-center flex-wrap">
        <div class="sidebar-header__avatar">
            @if (Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}" class="rounded-circle img-thumbnail img-fluid"
                    alt="Foto Profil">
            @else
                <img src="https://img.freepik.com/free-vector/illustration-businessman_53876-5856.jpg?size=626&ext=jpg"
                    class="rounded-circle img-fluid " alt="Foto Profil">
            @endif
        </div>
        <div class="sidebar-header__user">
            <h6 class="sidebar-header__user-name">{{ Auth::user()->name }}</h6>
            <span class="sidebar-header__user-role">{{ Auth::user()->role }}</span>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-menu__list">
            @if (Auth::user()->role == 'superadmin')
                <li class="sidebar-menu__item {{ Request::is(Auth::user()->role . '/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.superadmin') }}" class="sidebar-item__link">
                        <i class="fa-solid fa-house"></i>
                        <span class="d-none d-sm-inline">Beranda</span>
                    </a>
                </li>
            @else
                <li class="sidebar-menu__item {{ Request::is(Auth::user()->role . '/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.' . Auth::user()->role) }}" class="sidebar-item__link">
                        <i class="fa-solid fa-house"></i>
                        <span class="d-none d-sm-inline">Beranda</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                <li class="sidebar-menu__item {{ Request::is('admin/events') ? 'active' : '' }}">
                    <a href="{{ route('index.admin') }}" class="sidebar-item__link">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="d-none d-sm-inline">Admin</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'cashier')
                <li class="sidebar-menu__item">
                    <a href="#" class="sidebar-item__link dropdown-toggle" role="button"
                        data-bs-toggle="collapse" data-bs-target="#cashier-collapse" aria-expanded="false">
                        <i class="fa-solid fa-cash-register"></i>
                        <span class="d-none d-sm-inline">Kasir</span>
                    </a>
                </li>
                <div class="collapse show" id="cashier-collapse">
                    <ul class="btn-toggle-nav">
                        <li class="cashier-collapse__item {{ Request::is('cashier/dashboard') ? 'active' : '' }}"><a
                                href="{{ route('dashboard.cashier') }}">Dashboard Kasir</a>
                        </li>
                        <li class="cashier-collapse__item {{ Request::is('cashier/create') ? 'active' : '' }}"><a
                                href="{{ route('createOrder.cashier') }}">Tambah Pesanan</a>
                        </li>
                        <li class="cashier-collapse__item {{ Request::is('cashier/orders') ? 'active' : '' }}"><a
                                href="{{ route('orderData.cashier') }}">Data Order</a>
                        </li>
                        <li class="cashier-collapse__item {{ Request::is('cashier/members/index') ? 'active' : '' }}">
                            <a href="{{ route('indexMember.cashier') }}">Data Member</a>
                        </li>
                    </ul>
                </div>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'ironer')
                <li class="sidebar-menu__item {{ Request::is('ironer/orders') ? 'active' : '' }}">
                    <a href="{{ route('orderData.ironer') }}" class="sidebar-item__link">
                        <i class="fa-solid fa-dumpster-fire"></i>
                        <span class="d-none d-sm-inline">Penyetrika</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'packer')
                <li class="sidebar-menu__item {{ Request::is('packer/orders') ? 'active' : '' }}">
                    <a href="{{ route('orderData.packer') }}" class="sidebar-item__link">
                        <i class="fa-solid fa-boxes-packing"></i>
                        <span class="d-none d-sm-inline">Pembungkus</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin')
                <li class="sidebar-menu__item {{ Request::is('superadmin/users') ? 'active' : '' }}">
                    <a href="{{ route('users.superadmin') }}" class="sidebar-item__link">
                        <i class="fa-solid fa-user"></i>
                        <span class="d-none d-sm-inline">Pengguna</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
