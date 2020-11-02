@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('product', $product) }}
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ $product->image }}" alt="">
                    </div>
                    @foreach(json_decode($product->images, true) as $image)
                    <div class="single-prd-item">
                        <img class="img-fluid" src="{{ $image }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>

                    <h2>€ {{ $product->price }}</h2>
                    <ul class="list">
                    <li><a href="#"><span>Catégorie</span> : {{ $product->category->name }}</a></li>
                        <li><a href="#"><span>Disponibilité</span> : En stock</a></li>
                    </ul>
                    <p>{{ $product->slug }}</p>
                    <div class="card_area d-flex align-items-center">
                            <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                                <button class="primary-btn" type="submit">Ajouter au panier</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                 aria-selected="false">Détails</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{{ $product->description }}</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p>{{ $product->detail }}</p>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

@stop
