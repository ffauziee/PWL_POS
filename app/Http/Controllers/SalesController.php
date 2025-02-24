<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales', ['sales' => ['Transaction #001', 'Transaction #002', 'Transaction #003']]);
    }
}
