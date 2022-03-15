@extends('layout.layout-start')
@section('title', 'Registration')
@section('link-text', 'Log In')
@section('link-route', route('login'))

@section('content')

    <section class="register">
        <div class="container">
            <span class="register__title">
                    DarkBlog Registration

            </span>
            <form action="{{ route('register') }}" class="register__form" method="post" autocomplete="off">
                @csrf
                <div class="form__inner">
                    <div class="register__form-left">
                        <label class="register-label">
                            <span class="label__text">
                                Enter your name
                            </span>
                            <input autofocus type="text" class="register__input" value="{{ old('name') }}" name="name" placeholder="John">
                            @error('name')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="register-label">
                            <span class="label__text">
                                Enter last name
                            </span>
                            <input type="text" class="register__input" value="{{ old('lastname') }}" name="lastname" placeholder="Miller">
                            @error('lastname')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="register-label">
                            <span class="label__text">
                                Enter nickname
                            </span>
                            <input type="text" class="register__input"  value="{{ old('nickname') }}" name="nickname" placeholder="Hacker343">
                            @error('nickname')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <div class="register__form-right">
                        <label class="register-label">
                            <span class="label__text">
                                Enter your mail
                            </span>
                            <input type="email" class="register__input" value="{{ old('email') }}" name="email" placeholder="Hacker343@gmail.com">
                            @error('email')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="register-label">
                            <span class="label__text">
                                Enter password
                            </span>
                            <input type="password" class="register__input" name="password">
                            @error('password')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                        <label class="register-label">
                            <span class="label__text">
                                Confirm password
                            </span>
                            <input type="password" class="register__input" name="password_confirmation">
                            @error('password')
                                <div class="form_error-msg">{{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                </div>
                <input type="submit" value="Register" class="register__form-btn">
            </form>
        </div>
    </section>

@endsection

