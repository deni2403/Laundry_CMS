<nav class="navbar">
    <div class="container-fluid">
        <div class="brand-wrapper">
            <button class="toggler-button mx-2">
                <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </button>
            <span class="brand-wrapper__name">Alza Laundry</span>
        </div>
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>welcome, {{ Auth::user()->name }}</span>
            </button>
            <ul class="dropdown-menu">
                <form action="/logout" method="POST">
                    @csrf
                    <li><button class="dropdown-item" type="submit">Log out</button></li>
                </form>
            </ul>
        </div>
    </div>
</nav>
