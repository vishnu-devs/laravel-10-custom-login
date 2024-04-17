@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <h2>Login Form</h2>
            
        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            <button type="submit" name="submit">Login</button>
        </form>
        
        @if($errors->any())
            <span class="error">{{ $errors->first() }}</span>
        @endif
        
        <div class="switch">Don't have an account? <a href="{{ route('register') }}">Register here</a></div>
    </div>
</div>

<script>
    if (window.history && window.history.pushState) {
        $(window).on('popstate', function () {
            window.history.forward();
        });
    }
</script>

@endsection
