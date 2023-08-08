@extends('admin.layouts.app', ['page' => __('Products'), 'pageSlug' => 'profile'])

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
                            <a href="{{ route('admin.products.store') }}" class="btn btn-sm btn-primary">Add product</a>
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Made</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Pic`s</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->gender->gender }}</td>
                                    <td>{{ $product->category->category }}</td>
                                    <td>{{ $product->brand->brand }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->color->color }}</td>
                                    <td>{{ $product->made->made }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td style="width: 100px;">
                                        <select name="sizes[]" id="sizes[]" class="form-control" multiple style="width: 100%;">
                                            @foreach($product->sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div style="display: flex;">
                                            @if($product->pic1)
                                            <img src="{{ asset('storage/products/' . $product->pic1) }}" alt="Picture 1" style="width: 100px; height: 100px; margin-right: 10px;">
                                            @endif
                                            @if($product->pic2)
                                            <img src="{{ asset('storage/products/' . $product->pic2) }}" alt="Picture 2" style="width: 100px; height: 100px; margin-right: 10px;">
                                            @endif
                                            @if($product->pic3)
                                            <img src="{{ asset('storage/products/' . $product->pic3) }}" alt="Picture 3" style="width: 100px; height: 100px; margin-right: 10px;">
                                            @endif
                                            @if($product->pic4)
                                            <img src="{{ asset('storage/products/' . $product->pic4) }}" alt="Picture 4" style="width: 100px; height: 100px;">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('admin.products.preview',  ['id' => $product->id]) }}">View</a>
                                                <a class="dropdown-item" href="{{ route('admin.products.edit',  ['id' => $product->id]) }}">Edit</a>
                                                <form action="{{ route('admin.products.destroy', ['id' => $product->id]) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-center" aria-label="...">
                        {{ $products->links('pagination::simple-bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
