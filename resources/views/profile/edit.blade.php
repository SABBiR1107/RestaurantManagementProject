@extends('layouts.app')

@section('content')
<style>
    .profile-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('/public/assets/imgs/about-section.jpg') center/cover no-repeat;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    .profile-card {
        background: rgba(30,30,30,0.97);
        border-radius: 2rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        padding: 3rem 2.5rem;
        max-width: 600px;
        width: 100%;
        text-align: center;
        color: #fff;
        font-family: 'Segoe UI', 'Arial', sans-serif;
    }
    .profile-title {
        font-size: 2.7rem;
        font-weight: bold;
        color: #ff3366;
        margin-bottom: 2rem;
        letter-spacing: 2px;
        text-shadow: 1px 2px 8px #00000055;
    }
    .form-group {
        margin-bottom: 1.5rem;
        text-align: left;
    }
    .form-label {
        display: block;
        color: #ffb347;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    .form-input {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #ff336633;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .form-input:focus {
        outline: none;
        border-color: #ff3366;
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 0 15px #ff336633;
    }
    .form-input::placeholder {
        color: #ffd6e0;
        opacity: 0.7;
    }
    .error-message {
        color: #ff6b6b;
        font-size: 0.9rem;
        margin-top: 0.3rem;
        text-align: left;
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
    .btn-secondary {
        background: linear-gradient(90deg, #6c757d 0%, #495057 100%);
        color: #fff;
        box-shadow: 0 4px 15px #6c757d33;
    }
    .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px #6c757d44;
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
        <div class="profile-title">Edit Profile</div>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-input" value="{{ old('phone', $user->phone) }}" placeholder="Enter your phone number">
                @error('phone')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-input" rows="3" placeholder="Enter your address">{{ old('address', $user->address) }}</textarea>
                @error('address')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 