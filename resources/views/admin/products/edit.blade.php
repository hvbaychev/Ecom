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
                    <form action="{{ route('admin.products.update', [$id = $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="gender_id">Gender</label>
                            <select id="gender_id" class="form-control" name="gender_id">
                                @foreach($genders as $gender)
                                <option value="{{ $gender->id }}" style="color: black;" @if($product->gender_id == $gender->id) selected @endif>
                                    {{ $gender->gender }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" style="color:black;" @if($product->category_id == $category->id) selected @endif>
                                    {{ $category->category }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="brand_id">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" style="color:black;" @if($product->brand_id == $brand->id) selected @endif>
                                    {{ $brand->brand }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="description">Description</label>
                            <input type="text" id="description" class="form-control" name="description" value="{{ $product->description }}">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="color_id">Color</label>
                            <select name="color_id" id="color_id" class="form-control">
                                @foreach($colors as $color)
                                <option value="{{ $color->id }}" style="color:black;" @if($product->color_id == $color->id) selected @endif>
                                    {{ $color->color }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="made_id">Made</label>
                            <select name="made_id" id="made_id" class="form-control">
                                <option value="" style="color:black;">Select Made</option>
                                @foreach($mades as $made)
                                <option value="{{ $made->id }}" style="color:black;" @if($product->made_id == $made->id) selected @endif>
                                    {{ $made->made }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" class="form-control" name="price" value="{{ $product->price }}">
                        </div>


                        <div class="col-md-12 form-group">
                            <label for="sizes">Sizes</label>
                            <select name="sizes[]" id="sizes[]" class="form-control" multiple>
                                @foreach($sizes as $size)
                                <option value="{{ $size->id }}" @if(in_array($size->id, $product->sizes->pluck('id')->toArray())) selected @endif>{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="file">Upload Files (Maximum 4)</label>
                            <input type="file" id="file" name="files[]" accept=".img, .png" multiple>
                        </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
