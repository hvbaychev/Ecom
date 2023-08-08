@extends('admin.layouts.app', ['page' => __('Admin Profile'), 'pageSlug' => 'profile'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.profile.adminPost') }}" autocomplete="off">
                <div class="card-body">
                    @method('POST')
                    @if(Session::has('profile_success'))
                    <div class="alert alert-success">{{Session::get('profile_success')}}</div>
                    @endif
                    @if(Session::has('profile_fail'))
                    <div class="alert alert-danger">{{Session::get('profile_fail')}}</div>
                    @endif
                    @csrf

                    <div class="form-group">
                        <label>{{ __('First Name: ') }}</label>
                        <input type="text" name="first_name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ $data->first_name  }}" value="{{ $data->first_name  }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Last Name:') }}</label>
                        <input type="text" name="last_name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ $data->last_name }}" value="{{ $data->last_name }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __('Email address') }}</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ $data->email }}" value="{{ $data->email }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Password') }}</h5>
            </div>
            <form method="POST" action="{{ route('admin.profile.updatePass') }}" autocomplete="off">
                <div class="card-body">
                    @method('POST')
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="#">
                        <img class="avatar" src="{{ asset('assetsAdmin/black') }}/img/emilyz.jpg" alt="">
                        <h5 class="title">{{ $data->first_name . ' ' . $data->last_name }}</h5>
                    </a>
                    <p class="description">
                        {{ __('Ceo/Co-Founder') }}
                    </p>
                </div>
                </p>
                <div class="card-description">
                    {{ __('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                </div>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <button class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
