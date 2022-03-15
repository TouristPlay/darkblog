@extends('layout.layout-start')
@section('title', 'DarkBlog rules')
@section('link-text', 'Log In')
@section('link-route', route('login'))

@section('content')

    <section class="rules">
        <div class="container">
            <div class="rule">
                <span class="rule__title">
                    DarkBlog Rules
                </span>
                <ul class="rules__list">
                    <li class="rules__list-item">
                        Don't talk about the site
                    </li>
                    <li class="rules__list-item">
                        Change your IP address regularly.
                    </li>
                    <li class="rules__list-item">
                        Don't use the same nickname twice.
                    </li>
                    <li class="rules__list-item">
                        Do not talk too much about yourself online.
                    </li>
                    <li class="rules__list-item">
                        Don't show your phone number.
                    </li>
                    <li class="rules__list-item">
                        Do not use real email.
                    </li>
                </ul>
                <label class="rule-label">
                    <input type="checkbox" class="rule-checkbox" onchange="checkRuleCheckbox()">
                    I agree with the rules
                </label>
            </div>
            <div class="rule-btn">
                <a href="{{  route('register') }}" class="register-link disable">
                    Register
                </a>
            </div>
        </div>
    </section>

@endsection
