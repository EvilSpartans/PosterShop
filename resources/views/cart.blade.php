@extends('layouts.master')

@section('content')

<style>
    .single-product img {
        width: 120px;
    }

</style>

<!-- Start Banner Area -->
{{ Breadcrumbs::render('cart') }}
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $message }}
        </div>
        @endif
        <div class="cart_inner">

            @if(Cart::count() > 0)

            <h2> {{ Cart::count() }} Produit(s) dans le panier</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="dol">A propos</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="#">
                                            <img width="120px" class="img-thumbnail w-20"
                                                src="{{ $product->model->image }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media-body">
                                    <h4>{{ $product->model->name }}</h4>
                                    <p>{{ $product->model->detail }}</p>
                                </div>
                            </td>
                            <td>
                                <h5>$ {{ $product->model->price }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="x {{ $product->qty }}"
                                        title="Quantity:" class="input-text qty" readonly>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link"><i style="color: red; font-size: 25px;"
                                            class="fas fa-trash-alt"></i></button>
                                </form>

                                <form action="{{ route('cart.save', $product->rowId)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link"><i style="color: green; font-size: 25px;"
                                            class="fas fa-save"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td class="border">
                                <h5>Sous total</h5>
                                <p>Taxe</p>
                                <h4>Total</h4>
                            </td>
                            <td class="border">
                                <h5>{{ Cart::subtotal() }}</h5>
                                <p>{{ Cart::tax() }}</p>
                                <h4>{{ Cart::total() }}</h4>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner d-flex align-items-center justify-content-around mb-3">
                    <a class="gray_btn" href="{{ route('shop') }}">Continuer le Shopping</a>
                    <a class="primary-btn" href="{{ route('checkout') }}">Procéder au payment</a>
                </div>
            </div>

            @else

            <h3 class="my-3 text-center">Pas de produit dans le panier</h3>
            <div class="checkout_btn_inner d-flex align-items-center justify-content-around mb-3">
                <a class="gray_btn" href="{{ route('shop') }}">Continuer le Shopping</a>
            </div>

            @endif

        </div>
    </div>
    <div class="single-product-slider">
        <div class="container">
            @if(Cart::instance('save')->count() > 0)
            <h2 class="text-center my-5">{{ Cart::instance('save')->count() }} Produit(s) sauvegardé(s)</h2>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="dol">A propos</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::instance('save')->content() as $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="#">
                                            <img width="120px" class="img-thumbnail w-20"
                                                src="{{ $product->model->image }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="media-body">
                                    <h4>{{ $product->model->name }}</h4>
                                    <p>{{ $product->model->detail }}</p>
                                </div>
                            </td>
                            <td>
                                <h5>$ {{ $product->model->price }}</h5>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" name="qty" id="sst" maxlength="12" value="x {{ $product->qty }}"
                                        title="Quantity:" class="input-text qty">
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('save.destroy', $product->rowId) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link"><i style="color: red; font-size: 25px;"
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                                <form action="{{ route('save.store', $product->rowId) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link"><i style="color: green; font-size: 25px;"
                                            class="fas fa-cart-plus"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                    </tbody>
                </table>
                @else
                <h3 class="my-3 text-center">Pas de produit sauvegardés</h3>
                @endif
            </div>
        </div>
</section>
<!--================End Cart Area =================-->

@stop
