@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
      <h2>Register Form</h2>
      <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your Name" value="{{ old('name') }}"> 
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="password" placeholder="Enter your new password">
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
        <button type="submit" name="submit">Register</button>
      </form>
      <div class="switch">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
    </div>
  </div>
    
@endsection