<aside class="sidebar border-end shadow">
    <div class="sidebar-header d-flex align-items-center justify-content-center flex-wrap">
        <div class="sidebar-header__avatar">
            <img src="https://placekitten.com/200/200" class="img-thumbnail rounded-circle img-fluid " alt="avatar">
        </div>
        <div class="sidebar-header__user">
            <h6 class="sidebar-header__user-name">{{ Auth::user()->name }}</h6>
            <span class="sidebar-header__user-role">{{ Auth::user()->role }}</span>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-menu__list">
            @if (Auth::user()->role == 'superadmin')
                <li class="sideber-menu__item {{ (Request::is('/superadmin/dashboard*'))  ? 'active' : '' }}">
                    <a href="{{ route('dashboard.superadmin') }}" class="sideber-item__link">
                        <button><i class="fa-solid fa-gauge"></i></button>
                        <span class="d-none d-sm-inline">Beranda</span>
                    </a>
                </li>
            @else
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/dashboard'))  ? 'active' : '' }}">
                    <a href="{{ route('dashboard.' . Auth::user()->role) }}" class="sideber-item__link">
                        <button><i class="fa-solid fa-gauge"></i></button>
                        <span class="d-none d-sm-inline">Beranda</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/events'))  ? 'active' : '' }}">
                    <a href="{{ route('index.admin') }}" class="sideber-item__link">
                        <button><i class="fa-solid fa-pen-to-square"></i></button>
                        <span class="d-none d-sm-inline">Admin</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'cashier')
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/orders'))  ? 'active' : '' }}">
                    <a href="" class="sideber-item__link">
                        <button><i class="fa-solid fa-cart-shopping"></i></button>
                        <span class="d-none d-sm-inline">Kasir</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'ironer')
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/ironer'))  ? 'active' : '' }}">
                    <a href="" class="sideber-item__link">
                        <button><i class="fa-solid fa-toolbox"></i></button>
                        <span class="d-none d-sm-inline">Penyetrika</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'packer')
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/packer'))  ? 'active' : '' }}">
                    <a href="" class="sideber-item__link">
                        <button><i class="fa-solid fa-box"></i></button>
                        <span class="d-none d-sm-inline">Pembungkus</span>
                    </a>
                </li>
            @endif

            @if (Auth::user()->role == 'superadmin')
                <li class="sideber-menu__item {{ (Request::is(Auth::user()->role . '/users'))  ? 'active' : '' }}">
                    <a href="" class="sideber-item__link">
                        <button><i class="fa-solid fa-user"></i></button>
                        <span class="d-none d-sm-inline">Pengguna</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
