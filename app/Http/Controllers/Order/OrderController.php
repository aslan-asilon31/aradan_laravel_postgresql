<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order\Order;
use DB;
use Storage;
use Illuminate\Support\Collection;
use App\Services\Order\OrderService;
use App\Services\Midtrans\CreateSnapTokenService; // => letakkan pada bagian atas class
use DataTables;
use Illuminate\Support\Facades\Http;


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
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->orderService->getAllOrders();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="detail btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        // Return the view for non-AJAX requests
        return view('orders.index');
    }

    public function indexAPI(){
        $orders = Order::all();
        return $orders;
    }	
 
    public function show(Order $order)
    {
        // dd($order);
        $snapToken = $order->snap_token;
        if (empty($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
 
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();
 
            $order->snap_token = $snapToken;
            $order->save();
        }
 
        return view('orders.show', compact('order', 'snapToken'));
    }
}
