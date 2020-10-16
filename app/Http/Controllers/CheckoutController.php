<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    // Gérer le paiement
    public function checkout() {
        return view('checkout');
    }

    public function store(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51Gif4pJ4twzKEBMurN9aFACgdTyEWu4Kq2GKkuyAa2ex66NA5wOteN58gpOLX64XhSwHqmkJTMGnWzC77ODvbkfC00CZkinNN8');

        $metadata = [];
        foreach(Cart::content() as $item) {
            array_push($metadata, $item->model->name);
        }

        $myString = implode("", $metadata);


        try {
            $charge = \Stripe\Charge::create([
                'amount' => session()->has('coupon') ? round(Cart::total() - session()->get('coupon')['discount'], 2) * 100 : Cart::total()*100,
                'currency'=>'eur',
                'description'=>'Mon paiement',
                'source'=>$request->stripeToken,
                'receipt_email'=>$request->email,
                'metadata'=>[
                    'nom' => $request->firstname,
                    'prenom' => $request->lastname,
                    'email' => $request->email,
                    'addresse' => $request->address,
                    'ville' => $request->city,
                    'produits' => $myString
                    ]
            ]);

            $order = Order::create([
                'user_id'=> auth()->user()->id,
                'paiement_firstname'=>$request->firstname,
                'paiement_lastname'=>$request->lastname,
                'paiement_email'=>$request->email,
                'paiement_province'=>$request->province,
                'paiement_address'=>$request->address,
                'paiement_city'=>$request->city,
                'paiement_postalcode'=>$request->postalcode,
                'discount'=>session()->get('coupon')['name'] ?? null,
                'paiement_total'=> session()->has('coupon') ? round(Cart::total() - session()->get('coupon')['discount'], 2) : Cart::total(),
            ]);

            foreach(Cart::content() as $product) {
                OrderProduct::create([
                    'order_id'=>$order->id,
                    'product_id'=>$product->id,
                    'quantity'=>$product->qty
                ]);
            }

            return redirect()->route('checkout.success')->with('success', 'Paiement accepté');
        }
        catch (\Stripe\Exception\CardErrorException $e) {
            throw $e;
        }
    }

    // Paiement réussi
    public function success() {
        if(!session()->has('success')) {
            return redirect()->route('home');
        }
        $order = Order::latest()->first();
        // $orderProducts = OrderProduct::where('order_id', $order->id)->get();
        Cart::destroy();
        session()->forget('coupon');

        return view('success', [
            'order' => $order,
            // 'products' => $orderProducts
        ]);
    }


}
