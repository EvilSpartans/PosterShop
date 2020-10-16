@extends('layouts.master')

@section('includes')
<script src="https://js.stripe.com/v3/"></script>
@stop

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('checkout') }}
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Informations de livraison</h3>
                    <form class="row contact_form" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                    <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                placeholder="Nom">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Prénom">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Adresse email">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="province" name="province" placeholder="Pays"
                                required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Addresse de livraison" required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Ville"
                                required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" id="postalcode" name="postalcode"
                                placeholder="Code postale" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <div class="form-group">
                                    <label style="margin-bottom: 1.5%" for="card-element">
                                        Carte de crédit
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>
                        </div>
                        <button id="complete-order" type="submit" class="primary-btn my-3">Procéder au paiement</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Votre commande</h2>
                        <ul class="list">
                            <li><a href="#">Produits <span>Totale</span></a></li>
                            @foreach(Cart::content() as $product)
                            <li>
                                <a href="#">
                                    {{ $product->name }}
                                    <span class="middle">x {{ $product->qty }}</span>
                                    <span class="last">€ {{ $product->price }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Sous-totale <span>€ {{ Cart::subtotal() }}</span></a></li>

                            {{-- Coupons --}}
                            @if(session()->has('coupon'))
                            <li><a href="#">Réduction : ({{ session()->get('coupon')['name'] }})  <span> - € {{ session()->get('coupon')['discount'] }} </span></a></li>
                            <form action="{{ route('coupon.destroy') }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link" style="color: rgba(175, 0, 0, 0.61); font-size: 12px">Supprimer le coupon</button>
                            </form>
                            @endif
                            {{-- endCoupons --}}

                            <li><a href="#">Taxe <span>€ {{ Cart::tax() }}</span></a></li>
                            <hr>
                            <li><a href="#">Totale <span>€ {{ session()->has('coupon') ? Cart::total() - session()->get('coupon')['discount'] : Cart::total() }}</span></a></li>
                        </ul>
                    </div>
                    <div class="coupon my-3">
                        <div class="code">
                            {{-- {{ dump(session()->get('coupon')['name']) }} --}}
                            <p>Avez-vous un code ?</p>
                            <form action="{{ route('coupon.store') }}" method="POST">
                                @csrf
                                <div class="d-flex  align-items-center contact_form">
                                    <input type="text" name="coupon" id="coupon" class="form-control"
                                        placeholder="Coupon">
                                    <button class="primary-btn my-3" type="submit">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

@stop

@section('js')

<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_ZCOXsnWr8a0GsfOhGhTp8izk00sQQ2AKlE');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options = {
      firstname: document.getElementById('firstname').value,
      lastname: document.getElementById('lastname').value,
      email: document.getElementById('email').value,
  }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@stop
