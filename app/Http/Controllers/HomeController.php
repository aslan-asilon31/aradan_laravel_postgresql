<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use Storage;
use Illuminate\Support\Facades\Http;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function export_pdf()
    {
        $filename = 'products' . Carbon::now()->format('Y-m-d_H-i-s') . '.pdf';
        return Excel::download(new ProductsExport, $filename);
    }

}
