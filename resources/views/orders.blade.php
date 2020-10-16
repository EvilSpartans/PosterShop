@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('orders') }}
<!-- End Banner Area -->

<div class="container my-5">
    <div class="orders">
        <h2 class="text-center">Détails de la commande</h2>
        @foreach ($orders as $order)
        <div class="table-responsive order_details_table">
            <div class="d-flex justify-content-between my-5 px-5">
                <h4>
                    <i class="fas fa-receipt"></i>
                    Commande #{{ $order->id }}
                </h4>
                <h4>Date : {{ $order->created_at }}</h4>
            </div>
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

                    @endforeach
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>x {{ $product->pivot->quantity }}</td>
                        <td>$ {{ round($product->price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                    <tr>
                        <td><b>Totale</b></td>
                        <td></td>
                    <td>{{ round($order->paiement_total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>
@stop
