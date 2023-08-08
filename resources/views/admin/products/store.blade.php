@extends('admin.layouts.app', ['page' => __('Add new products'), 'pageSlug' => 'profile'])

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
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products-store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="gender_id">Gender</label>
                            <select id="gender_id" class="form-control" name="gender_id">
                                <option value="" style="color: black;">Select Gender</option>
                                @foreach($genders as $gender)
                                <option value="{{ $gender->id }}" style="color: black;">{{ $gender->gender }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" style="color:black;">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" style="color:black;">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="" style="color:black;">Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" style="color:black;">{{ $brand->brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" class="form-control" name="description">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="color_id">Color</label>
                            <select name="color_id" id="color_id" class="form-control">
                                <option value="" style="color:black;">Select Color</option>
                                @foreach($colors as $color)
                                <option value="{{ $color->id }}" style="color:black;">{{ $color->color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="made_id">Made</label>
                            <select name="made_id" id="made_id" class="form-control">
                                <option value="" style="color:black;">Select Made</option>
                                @foreach($mades as $made)
                                <option value="{{ $made->id }}" style="color:black;">{{ $made->made }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="sizes">Sizes</label>
                            <select name="sizes[]" id="sizes" class="form-control" multiple>
                                @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" class="form-control" name="price">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="file">Upload Files (Maximum 4)</label>
                            <input type="file" id="file" name="files[]" accept=".img, .png" multiple>
                        </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <div>
                        <a href="{{ route('admin.products.products') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
