@extends('layouts.index')
@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="#">{{ $product->category->category }}</a>
                    <span>{{ $product->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        @if($product->pic1)
                        <a class="pt active" href="#product-1">
                            <img src="{{ asset('storage/products/' . $product->pic1) }}" alt="Picture 1">
                        </a>
                        @endif
                        @if($product->pic1)
                        <a class="pt" href="#product-2">
                            <img src="{{ asset('storage/products/' . $product->pic2) }}" alt="Picture 2">
                        </a>
                        @endif
                        @if($product->pic1)
                        <a class="pt" href="#product-3">
                            <img src="{{ asset('storage/products/' . $product->pic3) }}" alt="Picture 3">
                        </a>
                        @endif
                        @if($product->pic1)
                        <a class="pt" href="#product-4">
                            <img src="{{ asset('storage/products/' . $product->pic4) }}" alt="Picture 4">
                        </a>
                        @endif
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="{{ asset('storage/products/' . $product->pic1) }}" alt="">
                            <img data-hash="product-2" class="product__big__img" src="{{ asset('storage/products/' . $product->pic2) }}" alt="">
                            <img data-hash="product-3" class="product__big__img" src="{{ asset('storage/products/' . $product->pic3) }}" alt="">
                            <img data-hash="product-4" class="product__big__img" src="{{ asset('storage/products/' . $product->pic4) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{ $product->name }} <span>Brand: {{ $product->brand->brand }} </span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    <div class="product__details__price">{{ number_format($product->price, 2) }}<span>{{ number_format($product->price * 1.20, 2)}}</span></div>
                    <p>{{ $product->description }}</p>
                    <div class="product__details__button">
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="">
                                    <label for="stockin">
                                        @if ($product->quantity > 0)
                                        In Stock
                                        @else
                                        Out of Stock
                                        @endif
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Available color:</span>

                                <div class="color__checkbox">
                                    <label for="{{ $product->color->color }}">
                                        <input type="radio" name="color__radio" id="{{ $product->color->color }}" checked>
                                        <span class="checkmark" style="background: {{ $product->color->color }}"></span>
                                    </label>
                                </div>

                            </li>
                            <li>
                                <span>Available size:</span>
                                <div class="size__btn">
                                    @foreach($product->sizes as $size)
                                    <label class="size-label">
                                        <input type="radio" name="selected_size" value="{{ $size->id }}">
                                        {{ $size->size }}
                                    </label>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <span>Promotions:</span>
                                @if($product->price < 50) <p>Free shipping</p>
                                    @else
                                    <p>Delivery $5.99</p>
                                    @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Specification</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Reviews ( 2 )</h6>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title"></div>
            </div>
        </div>
</section>
<!-- Product Details Section End -->
@endsection
