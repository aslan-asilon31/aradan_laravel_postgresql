<?php

namespace App\Services\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Payment\Payment;
use Illuminate\Support\Collection;
use App\Repositories\Payment\PaymentRepositoryInterface;
use DataTables;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllPayments()
    {
        return $this->paymentRepository->getAllPayments();
    }

    public function getPaymentById($id)
    {
        return $this->paymentRepository->getPaymentById($id);
    }
}