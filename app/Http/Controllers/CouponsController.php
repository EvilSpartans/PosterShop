<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();

        if(!$coupon) return redirect()->route('checkout')->withErrors('Coupon invalide');

        session()->put('coupon', [
            'name'=> $coupon->code,
            'discount'=> $coupon->value
        ]);

        return redirect()->route('checkout')->with('success', 'Le coupon a bien été appliqué !');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('checkout')->with('success', 'Coupon supprimé');
    }
}
