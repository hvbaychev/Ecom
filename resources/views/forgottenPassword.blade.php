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
            <h1>Forgotten Password</h1>
            <form action="{{ route('forgottenPasswordPost') }}" method="POST">
                @method('POST')
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
                <div class="name-register">
                    <label for="email">Your Email:</label>
                    <input type="email" name="email" id="email" required />
                    <div class="iconName-register"><i class="fa-solid fa-envelope"></i></i></div>
                </div>
                <input type="submit" value="Send Email">
            </form>
        </div>
    </div>
</body>
@endsection
