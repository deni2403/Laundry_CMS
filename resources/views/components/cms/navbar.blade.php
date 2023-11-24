<nav class="navbar shadow-sm">
    <div class="container-fluid">
        <div class="brand-wrapper">
            <span class="brand-wrapper__name">Alza Laundry</span>
            <button class="toggler-button me-auto">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>welcome, {{ Auth::user()->name }}</span>
            </button>
            <ul class="dropdown-menu">
                <form action="/logout" method="POST">
                    @csrf
                    <li><button class="dropdown-item" type="submit"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log out</button></li>
                </form>
            </ul>
        </div>
    </div>
</nav>
