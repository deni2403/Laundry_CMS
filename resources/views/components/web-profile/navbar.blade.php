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
                    <a class="nav-link {{ (Request::is('/')) ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link {{ (Request::is('tracking')) ? 'active' : '' }}" href="/tracking">Tracking Status</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link {{ (Request::is('about')) ? 'active' : '' }}" href="/about">About Us</a>
                </li>
                <li class="me-4">
                    <button class="login-btn p-1 px-2">
                        <a href="/member-login" class="mx-1">Login</a>
                    </button>

                    {{-- Opsi untuk user yang sudah login --}}
                    {{-- <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>Hi, Joko Abdi</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/member"><i class="fa-solid fa-user"></i><span class="ms-3">Profile Saya</span></a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span class="ms-3">Log out</span></a></li>
                        </ul>
                    </div> --}}
                </li>
            </ul>
        </div>
    </div>
</nav>
