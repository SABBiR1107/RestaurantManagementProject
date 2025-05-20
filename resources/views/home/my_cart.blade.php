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
            <a class="navbar-brand m-auto" href="#">
                <img src="assets/imgs/logo.png" class="brand-img" alt="">
                <span class="brand-txt">East Meets Feast</span>
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
                            <a href="{{ url('my_cart') }}" class="btn btn-primary ml-xl-4">Cart</a>
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
    /* Custom styles for the cart table and section */
    .cart-section {
        padding: 40px 0;
        border-radius: 16px;
        margin: 140px auto 40px auto; /* Increased top margin for more space from navbar */
        max-width: 900px;
        background: rgba(30, 30, 30, 0.95);
        box-shadow: 0 8px 32px rgba(0,0,0,0.25);
    }
    .cart-table th, .cart-table td {
        padding: 16px 12px;
        vertical-align: middle;
    }
    .cart-table th {
        background: #343a40;
        color: #fff;
        border: none;
    }
    .cart-table tr {
        background: #23272b;
        border-bottom: 1px solid #444;
    }
    .cart-table tr:last-child {
        border-bottom: none;
    }
    .cart-table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #fff;
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
        <div class="my-4 p-4 rounded" style="background: #23272b; box-shadow: 0 2px 8px rgba(0,0,0,0.15); display: inline-block;">
            <h4 class="mb-0" style="color: #ffc107; letter-spacing: 1px;">
            <i class="ti-wallet mr-2"></i>
            Total Price for the Cart = <span style="color: #fff;">{{ $total_price }}</span> <span style="font-size: 0.9em; color: #aaa;">Taka</span>
            </h4>
        </div>
    </div>
</div>

    <!--  Back to top button  -->
    <a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="#">
        <i class="ti-arrow-up"></i>
    </a>

    @include('home.js')

</body>
</html>
