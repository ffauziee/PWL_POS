<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductController extends Controller {
    public function foodBeverage() {
        return view('products', ['category' => 'Food & Beverage', 'items' => ['Coffee', 'Tea', 'Juice']]);
    }
    public function beautyHealth() {
        return view('products', ['category' => 'Beauty & Health', 'items' => ['Shampoo', 'Soap', 'Lotion']]);
    }
    public function homeCare() {
        return view('products', ['category' => 'Home Care', 'items' => ['Detergent', 'Mop', 'Broom']]);
    }
    public function babyKid() {
        return view('products', ['category' => 'Baby & Kid', 'items' => ['Diapers', 'Baby Powder', 'Toys']]);
    }
}