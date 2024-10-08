<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $newProducts = Product::whereJsonContains('status', ["new"])->inRandomOrder()->take(8)->get();
        $topProducts = Product::whereJsonContains('status', ["top"])->inRandomOrder()->take(8)->get();
        $saleProducts = Product::inRandomOrder()->whereNotNull('discount')->take(8)->get();
        $allProducts = Product::inRandomOrder()->take(8)->get();
        $sliderProducts = Product::inRandomOrder()->take(5)->get();

        return view('home', compact('allProducts', 'newProducts', 'topProducts', 'saleProducts', 'sliderProducts'));
    }

}
