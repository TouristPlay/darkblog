@extends('layout.layout-start')
@section('title', 'DarkBlog')
@section('link-text', 'Log In')
@section('link-route', route('login'))

@section('content')
    <section class="welcome">
        <div class="container">
            <div class="welcome__inner">
                <div class="main__title">
                    <span>Welcome</span>
                    <span>to the DarkBlog</span>
                </div>
                <div class="welcome__text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Accusantium, eius eos incidunt itaque odit placeat quibusdam
                    repellendus reprehenderit suscipit voluptas. At repellat sunt
                    temporibus voluptas!
                </div>
                <div class="welcome-btn">
                    <a href="{{  route('rules') }}" class="register-link">
                        I ready!
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
