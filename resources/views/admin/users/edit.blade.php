@extends('admin.layouts.app', ['page' => __('Users Management'), 'pageSlug' => 'profile'])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @method('PUT')
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf
                                <h4 class="card-title">Edit User:</h4>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <small class="form-text text-muted">Leave this field blank if you don't want to change the password.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mobile Phone:</label>
                                    <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{ $user->mobile_phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Country:</label>
                                    <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role:</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option  value="user" style="color: black;" {{ $user->role === 'user' ? 'selected' : '' }} >User</option>
                                        <option value="admin" style="color: black;" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
