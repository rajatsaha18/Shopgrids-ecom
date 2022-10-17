<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
//    private $categories;
    private $products;
    public function index()
    {
        $this->products = Product::orderBy('id', 'desc')->take(8)->get(['id', 'category_id', 'name', 'selling_price', 'image' ]);


        return view('website.home.home', [
//            'categories' => $this->categories,
            'products'   => $this->products,
        ]);
    }

    public function category($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('website.category.category',[
            'products' => $this->products
        ]);
    }

    public function detail($id)
    {
        return view('website.product.detail',[
            'product' => Product::find($id)
        ]);
    }
}
