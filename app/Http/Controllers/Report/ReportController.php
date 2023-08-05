<?php

namespace App\Http\Controllers\Report;

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
use Carbon\Carbon;

/**
 * @OA\Get(
 *    path="/api/report",
 *    summary="Get all Reports",
 *    description="Retrieve a list of all Reports",
 *    tags={"Reports"},
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
**/

class ReportController extends Controller
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
        return view('reports.index');
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

    public function filterReports(Request $request)
    {
        $filter = $request->get('filter');

        // Get the current date
        $currentDate = Carbon::now();

        // Initialize the start and end dates for the filter
        $startDate = null;
        $endDate = null;

        // Calculate the start and end dates based on the selected filter
        switch ($filter) {
            case 'today':
                $startDate = $currentDate->startOfDay();
                $endDate = $currentDate->endOfDay();
                break;
            case 'this_week':
                $startDate = $currentDate->startOfWeek();
                $endDate = $currentDate->endOfWeek();
                break;
            case 'this_month':
                $startDate = $currentDate->startOfMonth();
                $endDate = $currentDate->endOfMonth();
                break;
            default:
                // For any other filter value, return all orders
                break;
        }

        // Get the filtered orders based on the dates
        $data = $this->orderService->getFilteredOrders($startDate, $endDate);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="javascript:void(0)" class="detail btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}