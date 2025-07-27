@extends('layouts.app')

@section('content')
<style>
    .profile-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('/public/assets/imgs/about-section.jpg') center/cover no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .profile-card {
        background: rgba(30,30,30,0.97);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        padding: 3rem 2.5rem;
        max-width: 520px;
        width: 100%;
        text-align: center;
        color: #fff;
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }
    .profile-title {
        font-size: 2.7rem;
        font-weight: bold;
        color: #ff3366;
        margin-bottom: 1.2rem;
        letter-spacing: 2px;
        text-shadow: 1px 2px 8px #00000055;
    }
    .profile-section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #ffd700;
        margin-top: 2.2rem;
        margin-bottom: 1.1rem;
        letter-spacing: 1px;
        text-shadow: 1px 2px 8px #00000033;
    }
    .profile-list {
        list-style: none;
        padding: 0;
        margin: 0 0 1.5rem 0;
    }
    .profile-list li {
        font-size: 1.15rem;
        margin-bottom: 0.7rem;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: transparent;
        border-bottom: 1px solid #ff336633;
        padding-bottom: 0.3rem;
    }
    .profile-list li strong {
        color: #ffb347;
        font-weight: 600;
    }
    .profile-badge {
        display: inline-block;
        background: linear-gradient(90deg, #ff3366 0%, #ffb347 100%);
        color: #fff;
        border-radius: 20px;
        padding: 0.3rem 1.1rem;
        font-size: 1.05rem;
        margin-left: 0.5rem;
        font-weight: 500;
        box-shadow: 0 2px 8px #ff336633;
    }
    .text-muted {
        color: #ffd6e0 !important;
        font-size: 1.05rem;
    }
    .btn {
        display: inline-block;
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 25px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 0.5rem;
    }
    .btn-primary {
        background: linear-gradient(90deg, #ff3366 0%, #ffb347 100%);
        color: #fff;
        box-shadow: 0 4px 15px #ff336633;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px #ff336644;
    }
    .success-message {
        background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
        color: #fff;
        padding: 1rem;
        border-radius: 15px;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }
</style>
<div class="profile-hero">
    <div class="profile-card">
        <div class="profile-title">User Profile</div>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <ul class="profile-list">
            <li><strong>Name:</strong> <span class="profile-badge">{{ $user->name }}</span></li>
            <li><strong>Email:</strong> <span class="profile-badge">{{ $user->email }}</span></li>
            <li><strong>Phone:</strong> <span class="profile-badge">{{ $user->phone }}</span></li>
            <li><strong>Address:</strong> <span class="profile-badge">{{ $user->address }}</span></li>
        </ul>

        <div style="margin: 2rem 0;">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>

        <div class="profile-section-title">Order History</div>
        @if($orders->count())
            <ul class="profile-list">
                @foreach($orders as $order)
                    <li>
                        <strong>Order #{{ $order->id }}</strong>
                        <span class="profile-badge">{{ $order->created_at->format('Y-m-d') }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">No orders found.</p>
        @endif

        <div class="profile-section-title">Cart History</div>
        @if($carts->count())
            <ul class="profile-list">
                @foreach($carts as $cart)
                    <li>
                        <strong>Cart #{{ $cart->id }}</strong>
                        <span class="profile-badge">{{ $cart->created_at->format('Y-m-d') }}</span>
                    </li>
                    
                @endforeach
            </ul>
        @else
            <p class="text-muted">No cart history found.</p>
        @endif
    </div>
</div>
@endsection