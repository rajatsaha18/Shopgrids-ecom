<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetails extends Model
{
    private static $cartProducts;
    private static $orderDetail;
    use HasFactory;

    public static function newOrderDetail($order)
    {
        self::$cartProducts = Cart::getContent();
        foreach (self::$cartProducts as $cartProduct)
        {
            self::$orderDetail = new OrderDetails();
            self::$orderDetail->order_id        = $order->id;
            self::$orderDetail->product_id      = $cartProduct->id;
            self::$orderDetail->product_name    = $cartProduct->name;
            self::$orderDetail->product_image   = $cartProduct->attributes->image;
            self::$orderDetail->product_price   = $cartProduct->price;
            self::$orderDetail->order_qty       = $cartProduct->quantity;
            self::$orderDetail->save();
        }
    }
}
