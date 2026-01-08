{{-- ================================================
     FILE: resources/views/partials/navbar.blade.php
     STYLE: Gentle Monster Minimalist Navigation
     ================================================ --}}

<style>
    .gm-navbar {
        background-color: #ffffff;
        border-bottom: 1px solid #eee;
        padding: 20px 0;
        transition: all 0.3s ease;
    }

    /* Logo Style */
    .gm-logo {
        font-weight: 800;
        letter-spacing: 4px;
        text-transform: uppercase;
        font-size: 1.4rem;
        color: #000 !important;
        text-decoration: none;
    }

    /* Nav Links Style */
    .gm-nav-link {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #000 !important;
        padding: 0 15px !important;
    }

    .gm-nav-link:hover {
        opacity: 0.6;
    }

    /* Search Bar Minimalist */
    .gm-search-input {
        border: none;
        border-bottom: 1px solid #000;
        border-radius: 0 !important;
        font-size: 0.8rem;
        padding-left: 0;
        background: transparent;
    }

    .gm-search-input:focus {
        box-shadow: none;
        border-bottom: 1.5px solid #000;
        background: transparent;
    }

    /* Badge Counter Style */
    .gm-badge {
        font-size: 0.6rem;
        background-color: #000 !important;
        color: #fff;
        border-radius: 50%;
        padding: 3px 6px;
    }

    /* Icon Style */
    .gm-icon {
        font-size: 1.1rem;
        color: #000;
    }

    /* Remove Navbar Toggler Border */
    .navbar-toggler {
        border: none !important;
        padding: 0;
    }
    .navbar-toggler:focus {
        box-shadow: none;
    }
</style>

<nav class="navbar navbar-expand-lg gm-navbar sticky-top">
    <div class="container-fluid px-4 px-md-5">
        {{-- Logo --}}
        <a class="gm-logo" href="{{ route('home') }}">
            GENTLE MONSTER
        </a>

        {{-- Mobile Toggle --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="bi bi-list fs-2"></span>
        </button>

        {{-- Navbar Content --}}
        <div class="collapse navbar-collapse" id="navbarMain">
            {{-- Menu Tengah (Katalog/Kategori) --}}
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link gm-nav-link" href="{{ route('catalog.index') }}">Sunglasses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gm-nav-link" href="{{ route('catalog.index') }}">Glasses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gm-nav-link" href="#">Collaboration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gm-nav-link" href="#">Stores</a>
                </li>
            </ul>

            {{-- Menu Kanan (Search, Cart, User) --}}
            <ul class="navbar-nav align-items-center">
                {{-- Search --}}
                <li class="nav-item d-none d-xl-block me-3">
                    <form action="{{ route('catalog.index') }}" method="GET">
                        <input type="text" name="q" class="form-control gm-search-input" placeholder="SEARCH" value="{{ request('q') }}">
                    </form>
                </li>

                @auth
                    {{-- Wishlist --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative px-2" href="{{ route('wishlist.index') }}">
                            <i class="bi bi-heart gm-icon"></i>
                            @if(auth()->user()->wishlists()->count() > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge gm-badge">
                                    {{ auth()->user()->wishlists()->count() }}
                                </span>
                            @endif
                        </a>
                    </li>

                    {{-- Cart --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative px-2" href="{{ route('cart.index') }}">
                            <i class="bi bi-bag gm-icon"></i>
                            @php
                                $cartCount = auth()->user()->cart?->items()->count() ?? 0;
                            @endphp
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge gm-badge">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>

                    {{-- User Dropdown --}}
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link gm-nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                            {{ Str::upper(auth()->user()->name) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-1 rounded-0 shadow-sm">
                            <li><a class="dropdown-item gm-nav-link py-2" href="{{ route('profile.edit') }}">Account</a></li>
                            <li><a class="dropdown-item gm-nav-link py-2" href="{{ route('orders.index') }}">Orders</a></li>
                            @if(auth()->user()->isAdmin())
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item gm-nav-link py-2 text-primary" href="{{ route('admin.dashboard') }}">Admin Panel</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item gm-nav-link py-2 text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link gm-nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
