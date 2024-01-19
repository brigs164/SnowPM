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
        $expenses = ControlPanel::ExpensesGetYear();
        $etotal = 0;
        $ptotal = 0;
        $itotal = 0;
        $expenseTotals = [];
        $invoicePendingTotals = [];
        $invoiceTotals = [];
        
        for ($i=1; $i <= 12; $i++) { 

            //Pending Invoices
            foreach($invoices as $invoice){  
                if ($i == date("m", strtotime($invoice->Date))) {
                    if ($invoice->Status == "2") {
                        $ptotal = $invoice->Total + $ptotal;
                        $invoicePendingTotals[$i] = $ptotal;
                    }
                }
            }

            if ($ptotal == 0) {
                $invoicePendingTotals[$i] = 0;
            }
            $ptotal = 0;

            //Expenses
            foreach($expenses as $expense){  
                if ($i == date("m", strtotime($expense->Date))) {
                    $etotal = $expense->Amount + $etotal;
                    $expenseTotals[$i] = $etotal;
                }
            }

            if ($etotal == 0) {
                $expenseTotals[$i] = 0;
            }
            $etotal = 0;

            //Paid Invoices
            foreach($invoices as $invoice){  
                if ($i == date("m", strtotime($invoice->Date))) {
                    if ($invoice->Status == "3") {
                        $itotal = $invoice->Total + $itotal;
                        $invoiceTotals[$i] = $itotal;
                    }
                }
            }

            if ($itotal == 0) {
                $invoiceTotals[$i] = 0;
            }
            $itotal = 0;
        }
        
        return view('home')->with('invoices', $invoices)->with('expenses', $expenses)->with('jobs', $jobs)->with('invoiceTotals', $invoiceTotals)->with('invoicePendingTotals', $invoicePendingTotals)->with('expenseTotals', $expenseTotals);
    }
}
