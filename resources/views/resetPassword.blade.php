@extends('layouts.index')
@section('content')

<body class="body">
    <div class="modernForm-register">
        <div class="imageSection-register">
            <div class="image">
                <div class="overlay-register"></div>
                <img src="{{ asset('assets/img/logReg/loginRegster.jpg') }}" alt="pexels-yuri-manei-2272854">
            </div>
            <div class="textInside-register">
                <h1>Take Your New Clothes</h1>
                <p class="tagLine-register">NOW</p>
            </div>
            <div class="service-register">
                <p><span class="price-register"></span></p>
            </div>
        </div>
        <div class="contactForm-register">
            <h1>Reset Password</h1>
            <form action="{{ route('resetPasswordPost', $token) }}" method="POST">
                @method('POST')
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <input type="text" name="token" hidden value="{{ $token }}">
                <div class="name-register">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" required />
                    <div class="iconName-register"><i class="fa-solid fa-envelope"></i></div>
                </div>
                <div class="name-register">
                    <label for="password">New password:</label>
                    <input type="password" name="password" id="password" required />
                    <div class="iconName-register"><i class="fa-solid fa-envelope"></i></div>
                </div>
                <div class="name-register">
                    <label for="password">Confirm new password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required />
                    <div class="iconName-register"><i class="fa-solid fa-envelope"></i></div>
                </div>
                <input type="submit" value="Reset Password">
            </form>
        </div>
    </div>
</body>
@endsection
