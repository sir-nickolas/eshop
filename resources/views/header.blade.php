<?php
use App\Http\Controllers\CartController;
$total = 0;
if (auth()->check()) {
    $total = CartController::cartItem();
}
?>

<nav class="navbar navbar-expand-lg  bg-primary navbar-dark">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand">CyberStore</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{ url('cart') }}"
                    class="nav-item nav-link {{ Request::is('cart') ? 'active' : '' }}">Καλάθι({{ $total }})</a>
                <a href="{{ url('myorders') }}"
                    class="nav-item nav-link {{ Request::is('myorders') ? 'active' : '' }}">Οι Παραγγελίες μου</a>
                <a href="{{ url('about-us') }}"
                    class="nav-item nav-link {{ Request::is('about-us') ? 'active' : '' }}">Σχετικά Με εμάς</a>
            </div>
            <div class="navbar-nav nav-item dropdown me-5">
                <a href="#" class="nav-link dropdown-toggle me-3" data-bs-toggle="dropdown">
                    @if (auth()->check())
                        Καλώς Ηρθες {{ auth()->user()->name }}!
                    @else
                        Login/Register
                    @endif
                </a>
                <div class="dropdown-menu">
                    @if ( !empty(auth()->user()) && auth()->user()->email == 'admin@admin.com')
                        <a href="{{ url('admin/dashboard') }}" class="dropdown-item">Admin - Dashboard</a>
                    @endif
                    @if (auth()->check())
                        <a href="{{ url('logout') }}" class="dropdown-item">Logout</a>
                    @else
                        <a href="{{ url('register') }}" class="dropdown-item">Register</a>
                        <a href="{{ url('login') }}" class="dropdown-item">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
