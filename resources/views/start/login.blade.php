@extends('layout.layout-start')

@section('title', 'Login')
@section('link-text', 'Register')
@section('link-route', route('register'))

@section('content')
    <section class="login">
        <div class="container">
            <div class="login__title">
                    DarkBlog Login
            </div>
            <form action="{{ route('login') }}" class="login__form" method="post" autocomplete="off">
                @csrf
                <label class="login__label">
                    <div class="label__text">
                        Enter your email
                    </div>
                    <input type="email" autofocus class="login__input" placeholder="hask34@mail.com" name="email">
                    @error('email')
                        <div class="form_error-msg">{{ $message }}</div>
                    @enderror
                </label>
                <label class="login__label">
                    <div class="label__text">
                        Enter password
                    </div>
                    <input type="password" class="login__input" name="password">
                    @error('password')
                        <div class="form_error-msg">{{ $message }}</div>
                    @enderror
                </label>
                <input type="submit" class="login-btn" value="Log In">
            </form>
        </div>
    </section>
@endsection
