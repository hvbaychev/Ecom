@extends('admin.layouts.app', ['page' => __('Blog Articles'), 'pageSlug' => 'profile'])

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#" class="btn btn-sm btn-primary">Add product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="@" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name of article</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Description</label>
                                <textarea id="name" class="form-control" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="file" id="file" name="file" accept=".img, .png" style="display: none;">
                                <label for="file" id="fileLabel" class="file-label">
                                    <span class="file-label-text">Upload Files</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        <div>
                            <a href="@" class="btn btn-primary">Back</a>
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
@endsection
