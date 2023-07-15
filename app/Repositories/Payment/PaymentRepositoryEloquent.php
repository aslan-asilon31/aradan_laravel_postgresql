<?php 

namespace App\Repositories\Payment;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Payment\Payment;
use Illuminate\Support\Collection;
use App\Repositories\Payment\PaymentRepositoryInterface;
use DataTables;

class PaymentRepositoryEloquent implements PaymentRepositoryInterface
{
    public function getAllPayments()
    {
        return Payment::all();
    }

    public function getPaymentById($id)
    {
        return Payment::find($id);
    }

}
