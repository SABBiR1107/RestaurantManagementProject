<!-- Navbar -->
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#gallary">Gallary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#book-table">Book-Table</a>
            </li>
        </ul>
        <a class="navbar-brand m-auto" href="{{ url('/') }}">
            <img src="assets/imgs/logo.png" class="brand-img img-fluid" alt="" style="max-width: 120px; height: auto; border-radius: 9%;">
            <span class="brand-txt">The Velvet Spoon</span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#blog">Food<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
            </li>
            @auth
            <li class="nav-item">
             <a href="{{ route('profile.show') }}" class="btn btn-primary ml-xl-4 ml-2 my-1 my-lg-0">Profile</a>
            </li>
            @endauth
             @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a href="{{ url('my_cart') }}" class="btn btn-primary ml-xl-3 ml-2 my-1 my-lg-0 position-relative cart-btn">
                        <i class="ti-shopping-cart mr-1"></i>Cart
                        @if($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-primary ml-xl-3 ml-2 my-1 my-lg-0" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary ml-xl-5 ml-4 my-1 my-lg-0">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}"  class="btn btn-primary ml-xl-4 my-1 my-lg-0">Register</a>
                    </li>
                @endauth
            @endif
        </ul>
    </div>
</nav>
<style>
.cart-btn {
    position: relative;
}
.cart-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    min-width: 20px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}
/* Button hover effect for all navbar buttons */
.btn, .navbar-actions .btn, .d-flex .btn, .mobile-nav-scroll .btn {
    transition: background 0.2s, color 0.2s, transform 0.15s;
}
.btn:hover, .navbar-actions .btn:hover, .d-flex .btn:hover, .mobile-nav-scroll .btn:hover,
.btn:focus, .navbar-actions .btn:focus, .d-flex .btn:focus, .mobile-nav-scroll .btn:focus {
    background: #ff214f !important;
    color: #fff !important;
    transform: scale(1.05);
}
.mobile-nav-scroll::-webkit-scrollbar {
    display: none;
}
.mobile-nav-scroll {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
@media (max-width: 991.98px) {
    .navbar-brand .brand-img {
        max-width: 90px !important;
    }
    .navbar-brand .brand-txt {
        font-size: 1.1rem;
    }
    .navbar-collapse {
        display: none !important;
    }
    .mobile-nav-scroll .nav-link {
        font-size: 1rem;
        color: #fff;
        white-space: nowrap;
        padding: 0.5rem 0.75rem;
        border-radius: 0.25rem;
        transition: background 0.2s;
    }
    .mobile-nav-scroll .nav-link.active, .mobile-nav-scroll .nav-link:focus, .mobile-nav-scroll .nav-link:hover {
        background: #ff214f;
        color: #fff;
    }
    .mobile-nav-scroll {
        margin-left: -8px;
        margin-right: -8px;
        padding-left: 8px;
        padding-right: 8px;
    }
    .d-flex.flex-row > * {
        flex-shrink: 0;
    }
}
@media (min-width: 992px) {
    .mobile-nav-scroll, .d-lg-none {
        display: none !important;
    }
    .navbar-collapse {
        display: flex !important;
    }
}
</style>
<!-- header -->
<header id="home" class="header">
    <div class="overlay text-white text-center">
        <h1 class="display-2 font-weight-bold my-3">The Velvet Spoon</h1>
        <h2 class="display-4 mb-5">Always fresh &amp; Delightful</h2>
        <a class="btn btn-lg btn-primary" href="#gallary">View Our gallary</a>
    </div>
</header>
    