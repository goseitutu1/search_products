<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::query()->paginate(20,['name','code','cost_price','quantity']);

        return view('product',compact('products'));
    }

    // function uses eloquent query to fetch products
    public function getProducts($keyword){
        $products = Product::query()->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('code','like','%'. $keyword. '%')->get(['name','code','cost_price','quantity']);

        return \GuzzleHttp\json_encode([
            'code' => 200,
            'products' => $products
        ]);
    }
}
