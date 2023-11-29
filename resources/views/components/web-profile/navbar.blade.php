<nav class="navbar pt-0 navbar-expand-lg bg-body-tertiary">
    <div class="navbar-container shadow-sm container-fluid">
        <div class="brand-wrapper d-flex p-2 align-items-center">
            <img class="img-fluid" src="/assets/icons/logo.png" alt="">
            <a class="navbar-brand ms-3" href="/">Alza Laundry</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav d-flex align-items-center ms-auto mb-2 mb-lg-0 p-0">
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('tracking') ? 'active' : '' }}" href="/tracking">Lacak
                        Status</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">Tentang Kami</a>
                </li>
                @if (auth()->guard('member')->check() == 1)
                    {{-- Opsi untuk user yang sudah login --}}
                    <li class="nav-item me-4">
                        <a class="nav-link {{ Request::is('member') ? 'active' : '' }}" href="/member">Profil Saya</a>
                    </li>
                @endif

                @if (auth()->guard('member')->check() == 0 && auth()->check() == 0)
                    {{-- Opsi untuk user yang belum login --}}
                    <a href="/member-login" class="mx-1">
                        <button class="login-btn p-1 px-2">
                            Masuk
                        </button>
                    </a>
                @endif


                @if (auth()->guard('member')->check() == 1 || auth()->check() == 1)
                    {{-- Opsi untuk user yang sudah login --}}
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (auth()->guard('member')->check())
                                <span>Hi, {{ auth()->guard('member')->user()->name }}</span>
                            @else
                                <span>Hi, {{ auth()->user()->name }}</span>
                            @endif
                        </button>
                        <ul class="dropdown-menu">
                            @if (auth()->guard('member')->check())
                                <li><a class="dropdown-item" href="/member"><i class="fa-solid fa-user"></i><span
                                            class="ms-3">Profil Saya</span></a></li>
                                <form action="{{ route('logout.member') }}" method="POST">
                                    @csrf
                                    <li><button class="dropdown-item" type="submit"><i
                                                class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log out</button>
                                    </li>
                                </form>
                            @else
                                <form action="{{ route('logout.worker') }}" method="POST">
                                    @csrf
                                    <li><button class="dropdown-item" type="submit"><i
                                                class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log out</button>
                                    </li>
                                </form>
                            @endif
                        </ul>
                    </div>
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
