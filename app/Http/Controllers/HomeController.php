<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlPanel;

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
        $jobs = ControlPanel::JobsGetYear();
        $invoices = ControlPanel::InvoiceGetYear();
        $total = 0;
        $invoiceTotals = [];

        for ($i=1; $i <= 12; $i++) { 
            foreach($invoices as $invoice){  
                if ($i == date("m", strtotime($invoice->Date))) {
                    $total = $invoice->Total + $total;
                    $invoiceTotals[$i] = $total;
                }
            }

            if ($total == 0) {
                $invoiceTotals[$i] = 0;
            }

            $total = 0;
        }
        
        return view('home')->with('invoices', $invoices)->with('jobs', $jobs)->with('invoiceTotals', $invoiceTotals);
    }
}
