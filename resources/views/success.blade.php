@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('checkout.success') }}
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $message }}
        </div>
        @endif
        <h3 class="title_confirmation">Merci ! Nous avons bien reçu votre commande !</h3>

        <div class="row order_d_inner">
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Informations de commande</h4>
                    <ul class="list">
                        <li><a href="#"><span>Numéro de commande</span> : {{ $order->id }}</a></li>
                        <li><a href="#"><span>Date</span> : {{ $order->created_at }}</a></li>
                        <li><a href="#"><span>Totale</span> : EURO {{ round($order->paiement_total, 2) }}</a></li>
                        <li><a href="#"><span>Méthode de paiement</span> : Stripe</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="details_item">
                    <h4>Adresse de livraison</h4>
                    <ul class="list">
                        <li><a href="#"><span>Adresse</span> : {{ $order->paiement_address }}</a></li>
                        <li><a href="#"><span>Ville</span> : {{ $order->paiement_city }}</a></li>
                        <li><a href="#"><span>Pays</span> : {{ $order->paiement_country }}</a></li>
                        <li><a href="#"><span>Code Postale </span> : {{ $order->paiement_postalcode }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="order_details_table">
            <h2>Détail de la commande</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>x {{ $product->pivot->quantity }}</td>
                            <td>€ {{ round($product->price * $product->pivot->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td><b>Sous-total</b></td>
                            <td></td>
                            <td>€ {{ round($order->paiement_subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td><b>Taxe</b></td>
                            <td></td>
                            <td>€ {{ round($order->paiement_tax, 2) }}</td>
                        </tr> --}}
                        <tr>
                            <td><b>Totale</b></td>
                            <td></td>
                            <td>€ {{ round($order->paiement_total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
<!--================End Order Details Area =================-->

@stop
