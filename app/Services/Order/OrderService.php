<?php

namespace App\Services\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Order\Order;
use Illuminate\Support\Collection;
use App\Repositories\Order\OrderRepositoryInterface;
use DataTables;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function getOrderById($id)
    {
        return $this->orderRepository->getOrderById($id);
    }
}