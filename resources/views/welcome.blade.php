@extends('layouts1.app')

@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('head')

@endsection
@section('title','Welcome to Home')
@section('sub-heading','')

@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
           Welcome to my app
        </div>
    </div>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}" hidden>Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" hidden>Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                My APP
            </div>

            <div class="links">
                <!--@if (Route::has('login'))
                <a href="{{ url('/home') }}">Blogs list</a>
                @endif -->
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>


            </div>
        </div>
    </div>
</article>

<hr>
@endsection
@section('footer')
@endsection


