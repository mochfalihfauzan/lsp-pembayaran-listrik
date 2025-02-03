<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-secondary">
    <div class="container">
        <a class="navbar-brand" href="#">BayarListrik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex align-items-center">
                @if (Auth::user()->role == 'admin')
                    <a class="nav-link" href="/dashboard-admin">Home</a>
                    <a class="nav-link" href={{ route('users-management') }}>User Management</a>
                    <a class="nav-link" href={{ route('pelanggan') }}>Daftar Pelanggan</a>
                    <a class="nav-link" href={{ route('penggunaan-listrik-admin') }}>Penggunaan Listrik</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger d-lg-none">Logout</a>
                @elseif (Auth::user()->role == 'user')
                    <a class="nav-link" href="/dashboard-user">Home</a>
                    <a class="nav-link" href="{{ route('tagihan-listrik') }}">Tagihan</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger d-lg-none">Logout</a>
                @endif
            </div>
        </div>

        @if (Auth::check())
            <div class="d-none d-lg-flex">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        @endif
    </div>
</nav>
