<!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
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
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.png" class="brand-img" alt="Logo" style="max-width: 120px; height: auto; border-radius: 9%;">
                <span class="brand-txt">The Velvet Spoon</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testmonial">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>

                 @if (Route::has('login'))
                    @auth

                    <li class="nav-item">
                        <a href="{{ url('my_cart') }}" class="btn btn-primary ml-xl-4 position-relative cart-btn">
                            <i class="ti-shopping-cart mr-1"></i>Cart
                            @if($cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-primary" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-primary ml-xl-4">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}"  class="btn btn-primary ml-xl-4">Register</a>
                        </li>
                    @endauth
                @endif

            </ul>
        </div>
    </nav>
    <!-- header -->

   <style>
body {
    background: #23272b;
}
.custom-navbar {
    background: #23272b !important;
    box-shadow: 0 2px 12px rgba(0,0,0,0.12);
}
.navbar-brand .brand-img {
    border-radius: 10px !important;
}
.btn-primary, .btn-danger, .btn-warning {
    border-radius: 8px;
    font-weight: 500;
    transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}
.btn-primary:hover, .btn-danger:hover, .btn-warning:hover {
    filter: brightness(1.1);
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
}
.cart-section {
    padding: 48px 0 32px 0;
    border-radius: 24px;
    margin: 140px auto 40px auto;
    max-width: 900px;
    background: #181a1b;
    box-shadow: 0 12px 32px rgba(0,0,0,0.22);
    border: 1px solid #343a40;
}
.section-title {
    color: #ffc107;
    letter-spacing: 2px;
    font-weight: bold;
    font-size: 2.2rem;
}
.cart-table {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 0;
}
.cart-table th, .cart-table td {
    padding: 20px 16px;
    vertical-align: middle;
    border: none;
}
.cart-table th {
    background: #23272b;
    color: #ffc107;
    font-size: 1.1em;
    letter-spacing: 1px;
}
.cart-table tr {
    background: #181a1b;
    transition: background 0.2s;
}
.cart-table tr:hover {
    background: #23272b;
}
.cart-table img {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 12px;
    border: 2px solid #ffc107;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}
.cart-btn {
    position: relative;
    margin-right: 16px; /* Add space between cart and logout */
}
.cart-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #ff214f;
    color: white;
    border-radius: 50%;
    width: 22px;
    height: 22px;
    font-size: 13px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    min-width: 22px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
}
.total-card {
    background: #23272b;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    display: inline-block;
    padding: 1.5rem 2.5rem;
    border-radius: 16px;
    margin-top: 2rem;
    margin-bottom: 2rem;
}
.total-card h4 {
    color: #ffc107;
    font-weight: 600;
    margin-bottom: 0;
}
.confirm-section {
    max-width: 900px;
    margin: 0 auto 40px auto;
    background: #23272b;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    padding: 2.5rem 2rem;
}
.confirm-section h3 {
    color: #ffc107;
    letter-spacing: 1px;
    font-weight: bold;
    margin-bottom: 2rem;
}
.form-control {
    border-radius: 8px;
    background: #181a1b;
    color: #fff;
    border: 1px solid #444;
}
.form-control:focus {
    border-color: #ffc107;
    background: #23272b;
    color: #fff;
    box-shadow: 0 0 0 2px #ffc10744;
}
@media (max-width: 991.98px) {
    .cart-section, .confirm-section {
        margin: 100px 8px 20px 8px;
        padding: 20px 8px;
        max-width: 100%;
    }
    .cart-table th, .cart-table td {
        padding: 12px 6px;
    }
    .total-card {
        padding: 1rem 1.2rem;
    }
}
</style>
<br><br>

<div id="gallary" class="cart-section text-center bg-dark text-light wow fadeIn">
    <h2 class="section-title mb-4">MY CART</h2>
    <div class="table-responsive">
        <table class="table cart-table table-dark table-hover">
            
                <tr>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>
            
           
               
                @php
                    $total_price = 0;
                @endphp
                @foreach ($data as $data )

                <tr>
                    <td>{{ $data->titile }}</td>
                    <td>{{ $data->price }} Taka</td>
                    <td>{{ $data->quantity }}</td>
                    <td>
                        <img src="food_img/{{ $data->image }}" alt="loadingImages">
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to Remove this??')" href="{{ url('remove_cart',$data->id) }}" class="btn btn-danger">Remove</a>
                    </td> 
                </tr>
                    @php
                        $total_price = $total_price + $data->price;
                    @endphp
                @endforeach
            
        </table>
        <div class="total-card">
            <h4 class="mb-0">
            <i class="ti-wallet mr-2"></i>
            Total Price for the Cart = <span style="color: #fff;">{{ $total_price }}</span>
            <span style="font-size: 0.9em; color: #aaa;">Taka</span>
            </h4>
        </div>
    </div>
</div>

<div class="container my-5" style="max-width: 100%;">
    <div class="confirm-section">
        <h3 class="text-center">Confirm Your Order</h3>
        <form action="{{ url('confirm_order') }}" method="post">
            @csrf
            <div class="form-group mb-3 text-left">
                <label for="name" class="text-light">Name</label>
                <input type="text" value="{{ Auth()->user()->name }}" name="name" class="form-control" placeholder="Write your name" required>
            </div>
            <div class="form-group mb-3 text-left">
                <label for="email" class="text-light">Email</label>
                <input type="email" value="{{ Auth()->user()->email }}" name="email" class="form-control" placeholder="Write your email" required>
            </div>
            <div class="form-group mb-3 text-left">
                <label for="phone" class="text-light">Phone</label>
                <input type="number" value="{{ Auth()->user()->phone }}" name="phone" class="form-control" placeholder="Write your Phone" required>
            </div>
            <div class="form-group mb-4 text-left">
                <label for="address" class="text-light">Address</label>
                <input type="text" value="{{ Auth()->user()->address }}" name="address" class="form-control" placeholder="Write your address" required>
            </div>
            <div class="text-center">
                <input type="submit" value="Confirm Order" class="btn btn-warning px-4 font-weight-bold">
            </div>
        </form>
    </div>
</div>
    <!--  Back to top button  -->
    <a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="#">
        <i class="ti-arrow-up"></i>
    </a>

    @include('home.js')

</body>
</html>
