<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $totalPrice = 0;
        $itemTotalPrice = 0;
        $cartItems = \Cart::getContent();

        foreach ($cartItems as $item) {
            // Get the price and quantity of each item
            $price = $item->price;
            $quantity = $item->quantity;
    
            // Calculate the total price for this item
            $itemTotalPrice = $price * $quantity;
    
            // Add the total price of this item to the overall total price
            $totalPrice += $itemTotalPrice;
        }

        return view('visitors.cart', ['itemTotalPrice' => $itemTotalPrice,'totalPrice' => $totalPrice, 'cartItems' => $cartItems]);
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
