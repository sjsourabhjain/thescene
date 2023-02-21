@extends('layouts.admin_login')
@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="contentBox">
                <div class="logo w-100 text-center">
                    <img src="{{ asset('assets/site_logo.png') }}" alt="logo">
                </div>
                <h3 class="text-center">Reset Password</h3>
                <p class="text-cnter">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                @include('flash-message')
                <form class="mt-5" method="POST" action="{{ route('admin.send_verification_email') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fal fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn w-100 light">Submit</button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('admin.home') }}">Back to Login</a>
                    </div>
                </form>
            </div>
            <div class="imgBox d-none d-md-block">
                <img src="{{ asset('images/login.jpg') }}" alt="logo">
            </div>
        </div>
    </div>
@endsection