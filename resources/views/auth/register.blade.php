

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-form">
        <form method="POST" action="{{ route('auth.processRegister') }}">
            @csrf

            <h4 class="modal-title">Register Now</h4>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" id="name" name="name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Email" id="email" name="email">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="form-group small">
                <a href="#" class="forgot-link">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-dark btn-block btn-lg" value="Register">Register</button>
        </form>
        <div class="text-center small">Already have an account? <a href="{{ route('auth.login') }} ">Login Now</a></div>
    </div>
</div>
@endsection

