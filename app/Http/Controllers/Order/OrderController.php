<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;


/**
 * @OA\Get(
 *    path="/api/order",
 *    summary="Get all Orders",
 *    description="Retrieve a list of all Orders",
 *    tags={"Order"},
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
**/

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders/index', compact('orders'));
    }
    public function indexAPI(){
        $orders = Order::all();
        return $orders;
    }
}
