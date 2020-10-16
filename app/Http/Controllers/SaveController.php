<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $item = Cart::instance('save')->get($id);
        Cart::instance('save')->remove($id);

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        return redirect()->route('cart')->with('success', 'Produit ajouté au panier');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('save')->remove($id);
        return back()->with('success', 'Produit supprimé');
    }
}
