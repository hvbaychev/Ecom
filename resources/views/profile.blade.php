@extends('layouts.index')
@section('content')


<div class="container bootstrap snippets bootdey">
    <div class="row ng-scope">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    @if (Session::has('loginId'))
                    <p>Name: {{ $data->first_name . ' ' . $data->last_name }}</p>
                    <p>Email: {{ $data->email }}</p>
                    <p>Phone: {{ $data->mobile_phone }}</p>
                    <p>Address: {{ $data->country . ', ' . $data->city . ', ' . $data->address }}</p>
                    @endif
                    <div class="text-center">
                    @if (Session::has('loginId') && $data->role === 'admin')
                    <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">Go to admin panel</a>
                    @endif
                    <a class="btn btn-danger" href="{{ route('logout') }}">Sign out</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default hidden-xs hidden-sm">
                <div class="panel-heading">
                    <div class="panel-title text-center">Recent orders</div>
                </div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="#"><img class="media-object img-circle img-thumbnail thumb48" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Contact"></a>
                        </div>
                        <div class="media-body pt-sm">
                            <div class="text-bold">Connie Lambert
                                <div class="text-sm text-muted">2 weeks ago</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="h4 text-center">Contact Information</div>
                    <div class="row pv-lg">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <form class="form-horizontal ng-pristine ng-valid" action="{{ route('profilePost') }}" method="POST">
                                @method('POST')
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="first_name">F.Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="first_name" name="first_name" type="text" placeholder="" value="{{ Session::has('loginId') ? $data->first_name : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="last_name">L.Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="last_name" name="last_name" type="text" placeholder="" value="{{ Session::has('loginId') ? $data->last_name : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="email">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="email" name="email" type="email" value="{{ Session::has('loginId') ? $data->email : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="mobile_phone">Mobile</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="mobile_phone" name="mobile_phone" type="text" value="{{ Session::has('loginId') ? $data->mobile_phone : '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="country">Country</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="country" name="country" type="text" value="{{ Session::has ('loginId') ? $data->country : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="city">City</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="city" name="city" type="text" value="{{ Session::has ('loginId') ? $data->city : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="address">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="address" name="address" row="4">{{ Session::has ('loginId') ? $data->address : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button class="btn btn-info" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
