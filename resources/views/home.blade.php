@extends('layouts.master')

@section('content')

<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>À propos</h1>
                                <h3>Qui sommes-nous ?</h3>
                                <p>
                                    Nous sommes une société indépendante inscrite au registre des commerçants. Nous proposons la vente d'affiches de cinéma en petit et grand format. Pour plus d'informations, n'hésitez pas à nous <a style="color: #17a2b8" href="{{ route('contact') }}"> contacter </a> </p>
                                <div class="add-bag d-flex align-items-center">
                                    <button class="primary-btn" type="submit">
                                        <i class="fas fa-plus"></i>
                                       <a href="{{ route('shop') }}"> <span class="add-text text-uppercase text-white">Acheter</span> </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="w-50" src="{{ asset('img/product/legend.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1>Cette semaine</h1>
                                <h3>Star wars IX</h3>
                                <p>
                                Star Wars, épisode IX : L'Ascension de Skywalker est un film américain de science-fiction de type space opera coécrit et réalisé par J. J. Abrams, sorti en 2019. Neuvième opus de la saga Star Wars, il fait suite à l'épisode VIII : Les Derniers Jedi.</p>
                                <div class="add-bag d-flex align-items-center">
                                    <button class="primary-btn" type="submit">
                                        <i class="fas fa-plus"></i>
                                       <a href="{{ route('shop') }}"> <span class="add-text text-uppercase text-white">Acheter</span> </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="banner-img">
                                <img class="w-50" src="{{ asset('img/product/sw.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Livraison</h6>
                    <p>A la charge du client</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon2.png" alt="">
                    </div>
                    <h6>Politique RGPD </h6>
                    <p>Vos données sont protégées</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon3.png" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Pour toutes vos demandes</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Payment sécurisé</h6>
                    <p>En ligne avec Stripe</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Derniers produits</h1>
                        <p>Découvrez sans plus attendre les dernières nouveautés ! </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="{{ $product->image }}" alt="">
                        </div>
                        <div class="product-details">
                            <h6 class="text-center">{{ $product->name }}</h6>
                            <div class="price text-center">
                                <h6>€ {{ $product->price }}</h6>
                            </div>
                            <p><small>{{ $product->detail }}</small></p>
                            <div class="prd-bottom d-flex justify-content-around">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    </form>
                                <a href="{{ route('shop.show',$product->slug) }}" class="btn btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Meilleures ventes</h1>
                        <p>Les produits les plus vendues</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products2 as $product)
                <!-- single product -->
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                    <div class="img-wrapper">
                        <img class="img-fluid" src="{{ $product->image }}" alt="">
                    </div>
                        <div class="bestseller-details">
                            <h6 class="text-center">{{ $product->name }}</h6>
                            <div class="price text-center">
                                <h6>€ {{ $product->price }}</h6>
                            </div>
                            <p><small>{{ $product->detail }}</small></p>
                            <div class="prd-bottom d-flex justify-content-around">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    </form>
                                <a href="{{ route('shop.show',$product->slug) }}" class="btn btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
    <div class="container">
        <div class="row">
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
            </a>
        </div>
    </div>
</section>
<!-- End brand Area -->
@endsection
