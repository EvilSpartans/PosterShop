<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 6;

        if(request()->category) {
            $category = Category::where('slug', request()->category)->firstOrFail();
            $products = Product::where('category_id', $category->id);
        }
        else {
            $products = Product::take($pagination);
        }

        if(request()->sort == 'asc') {
            $products = $products->orderBy('price')->paginate($pagination);
        }
        else if(request()->sort == 'desc') {
            $products = $products->orderBy('price', 'DESC')->paginate($pagination);
        }

        else if (request('term')) {
            $products = $products->where('name', 'Like', '%' . request('term') . '%')->paginate($pagination);
        }

        else {
            $products = $products->paginate($pagination);
        }

        $categories = Category::all();
        return view('shop', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product', [
            'product' => $product
        ]);
    }

}
