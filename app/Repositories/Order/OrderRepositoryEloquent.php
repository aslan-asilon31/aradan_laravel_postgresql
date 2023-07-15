<?php 

namespace App\Repositories\Order;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Order\Order;
use Illuminate\Support\Collection;
use App\Repositories\Order\OrderRepositoryInterface;
use DataTables;

class OrderRepositoryEloquent implements OrderRepositoryInterface
{
    public function getAllOrders()
    {
        return Order::all();
    }

    public function getOrderById($id)
    {
        return Order::find($id);
    }

}
