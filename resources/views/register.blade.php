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
            <h1>Registration Form</h1>
            <form action="{{ route('register-user') }}" method="POST">
                @method('POST')
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="name-register">
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" id="first_name" placeholder="ex: Lindsey" value="{{ old('first_name') }}" required />
                    <span class="text-danger">@error('first_name') {{$message}} @enderror</span>
                    <div class="iconName-register"><i class="fa-solid fa-user"></i></div>
                </div>
                <div class="name-register">
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" placeholder="ex:  Wilson" value="{{ old('last_name') }}" required />
                    <span class="text-danger">@error('last_name') {{$message}} @enderror</span>
                    <div class="iconName-register"><i class="fa-solid fa-user"></i></div>
                </div>
                <div class="name-register">
                    <label for="email">Your Email:</label>
                    <input type="email" name="email" id="email" placeholder="ex:  LindseyWilson@gmail.com" value="{{ old('email') }}" required />
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    <div class="iconName-register"><i class="fa-solid fa-envelope"></i></i></div>
                </div>
                <div class="name-register">
                    <label for="Password">Password:</label>
                    <input type="password" name="password" id="password" required />
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    <div class="iconName-register"><i class="fa-solid fa-lock"></i></div>
                </div>
                <div class="name-register">
                    <label for="Password">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required />
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    <div class="iconName-register"><i class="fa-solid fa-lock"></i></div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="checkbox" name="checkbox" required>
                    <label for="checkbox">By signing up, you agree to the
                        <p><a href="#">Play Term of Service</p>
                    </label>
                </div>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
@endsection
