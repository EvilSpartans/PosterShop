@extends('layouts.master')

@section('content')

<style>
    .product-details {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

</style>

<!-- Start Banner Area -->
{{ Breadcrumbs::render('shop') }}
<!-- End Banner Area -->

<div class="container mt-5">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Filtrer par catégories</div>
                <ul class="main-categories">
                    @foreach($categories as $category)
                    <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false"
                            aria-controls="fruitsVegetable">
                            <a href="{{ route('shop', ['category'=>$category->slug]) }}">
                                {{ $category->name }}<span class="number">({{ count($category->products) }})</span>
                            </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- <div class="sidebar-categories mb-5">
				<div class="head">Price</div>
				<ul class="main-categories">
					<li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable" aria-expanded="false" aria-controls="fruitsVegetable">
						<a href="">
							< $5
						</a>
					</li>
				</ul>
			</div> -->
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex align-items-center justify-content-center flex-wrap">
                <div class="dropdown">
                    <a class="btn" style="color: white;" href="{{ route('shop') }}">Tout afficher</a>
                    <a class="btn" style="color: white;"
                        href="{{ route('shop', ['category'=>request()->category, 'sort' => 'asc']) }}">Prix
                        croissants</a>
                    <a class="btn" style="color: white;"
                        href="{{ route('shop', ['category'=>request()->category, 'sort' => 'desc']) }}">Prix
                        décroissants</a>
                </div>
                <form class="form-inline m-auto" action="{{ route('shop') }}"  method="GET">
                    <input class="form-control mr-sm-2" type="text" name="term" id="term" placeholder="Rechercher">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i style="cursor: pointer; color: white" class="fas fa-search"></i></button>
                </form>
                {{-- <div class="pagination ml-auto">
                    {{ $products->appends(request()->input())->links() }}
                </div> --}}
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    @foreach($products as $product)
                    <!-- single product -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <a href="{{ route('shop.show',$product->slug) }}">
                                <div class="img-wrapper">
                                    <img class="img-fluid" src="{{ $product->image }}" alt="">
                                </div>
                            </a>
                            <div class="product-details">
                                <h6>{{ $product->name }}</h6>
                                <div class="price">
                                    <h6>€ {{ $product->price }}</h6>
                                </div>
                                <div class="prd-bottom">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <button class="btn btn-outline-info" type="submit">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </section>
            <!-- End Best Seller -->

            @If ($products->count() == 0)
            <div class="noresult">
            <h1>Ce film n'est plus disponible</h1>
            <h3>Essayer un autre nom ! </h3>
            <img src="{{ asset('img/product/search.png')}}" alt="">
            </div>
            @endif

            <!-- Start Filter Bar -->
            <div style="margin-bottom: 5%;" class="filter-bar d-flex flex-wrap align-items-center">
                <div class="dropdown">
                    <a class="btn" style="color: white;" href="{{ route('shop') }}">Tout afficher</a>
                    <a class="btn" style="color: white;"
                        href="{{ route('shop', ['category'=>request()->category, 'sort' => 'asc']) }}">Prix
                        croissants</a>
                    <a class="btn" style="color: white;"
                        href="{{ route('shop', ['category'=>request()->category, 'sort' => 'desc']) }}">Prix
                        décroissants</a>
                </div>
                {{-- <form class="form-inline" action="{{ route('shop') }}"  method="GET">
                    <input class="form-control mr-sm-2" type="text" name="term" id="term">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i style="cursor: pointer; color: white" class="fas fa-search"></i></button>
                </form> --}}
                <div style="margin: auto" class="pagination ml-auto">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@stop
