<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Accueil', route('home'));
});

// Home > Contact
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});

// Home > Orders
Breadcrumbs::for('orders', function ($trail) {
    $trail->parent('home');
    $trail->push('Commandes', route('orders'));
});

// Home > Shop
Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Boutique', route('shop'));
});

// Home > Cart
Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Panier', route('cart'));
});

// Home > Checkout
Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('home');
    $trail->push('Paiement', route('checkout'));
});

Breadcrumbs::for('checkout.success', function ($trail) {
    $trail->parent('home');
    $trail->push('Paiement accepté', route('checkout.success'));
});

// Home > Login
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('Connexion', route('login'));
});

// Home > Register
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('Inscription', route('register'));
});

// Home > Email
Breadcrumbs::for('email', function ($trail) {
    $trail->parent('home');
    $trail->push('Mot de passe oublié', route('password.email'));
});

// Home > Reset
Breadcrumbs::for('reset', function ($trail) {
    $trail->parent('home');
    $trail->push('Mot de passe oublié', route('password.request'));
});

// Shop > Product
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('shop');
    $trail->push($product->name, route('shop.show', $product->id));
});


