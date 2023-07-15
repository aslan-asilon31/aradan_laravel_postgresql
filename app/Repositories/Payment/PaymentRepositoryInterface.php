<?php

namespace App\Repositories\Payment;

interface PaymentRepositoryInterface
{
    public function getAllPayments();

    public function getPaymentById($id);
}
