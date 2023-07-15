<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function getAllOrders();

    public function getOrderById($id);
}
