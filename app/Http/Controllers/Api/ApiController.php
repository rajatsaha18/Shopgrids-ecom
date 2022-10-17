<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    private $categories;
    private $subCategories;
    private $products;
    private $product;
    private $result;
    private $customer;
    private $order;
    private $orderDetail;
    public function getAllCategory()
    {
        $this->categories = Category::all();
        foreach ($this->categories as $key => $category)
        {
            $this->subCategories = SubCategory::where('category_id', $category->id)->get();
            $this->result[$key]['category'] = $category;
            $this->result[$key]['sub_category'] = $this->subCategories;

        }
        return response()->json($this->result);
    }

    public function getLatestProduct()
    {
        $this->products = Product::orderBy('id','desc')->take('8')->get(['id', 'name', 'selling_price', 'image',]);
        foreach ($this->products as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($this->products);
    }

    public function getProductByCategory($id)
    {
        $this->products = Product::where('category_id', $id)->orderBy('id','desc')->take(100)->get(['id', 'name', 'selling_price', 'image',]);
        foreach ($this->products as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($this->products);

    }

    public function getProductById($id)
    {
        $this->product = Product::find($id);
        $this->product->image = asset($this->product->image);
        $this->product->category = Category::find($this->product->category_id)->name;
        $this->product->brand = Brand::find($this->product->brand_id)->name;
        return response()->json($this->product);
    }

    public function newOrder(Request $request)
    {
//        return response()->json('Hello World');

        $this->customer = new Customer();
        $this->customer->name       = $request->customer['name'];
        $this->customer->email      = $request->customer['email'];
        $this->customer->password   = bcrypt($request->customer['mobile']);
        $this->customer->mobile     = $request->customer['mobile'];
        $this->customer->address    = $request->customer['address'];

        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->order_total       = $request->orderTotal;
        $this->order->tax_total         = $request->taxTotal;
        $this->order->shipping_total    = $request->shippingCost;
        $this->order->order_date        = date('Y-m-d');
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->payment_method    = $request->customer['paymentMethod'];
        $this->order->delivery_address  = $request->customer['address'];
        $this->order->save();

        foreach ($request->products as $product)
        {
            $this->orderDetail = new OrderDetails();
            $this->orderDetail->order_id        = $this->order->id;
            $this->orderDetail->product_id      = $product['id'];
            $this->orderDetail->product_name    = $product['name'];
            $this->orderDetail->product_price   = $product['price'];
            $this->orderDetail->order_qty       = $product['qty'];
            $this->orderDetail->save();

        }
        return response()->json([
            'success' => true,
            'id'      => $this->customer->id,
            'name'    => $this->customer->name,

        ]);

    }
}
