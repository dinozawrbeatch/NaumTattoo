<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tattoo;

class WelcomeController extends Controller
{
    public function index()
    {
        $masters = Master::all();
        $tattoos = Tattoo::all();
        $reviews = Review::all();
        $products = Product::all();

        return view('welcome', [
            'masters' => $masters,
            'tattoos' => $tattoos,
            'reviews' => $reviews,
            'products' => $products,
        ]);
    }
}
