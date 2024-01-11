<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ControlPanel;
use App\Models\Product;

class TabletController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = ControlPanel::JobsGetYear();
        $invoices = ControlPanel::InvoiceGetYear();
        $clients = Client::all()->where('Status', '1')->pluck('Name', 'id');
        $products = ControlPanel::ProductsGetYear()->pluck('Name', 'id')->reverse();
        $payments = ControlPanel::PaymentsGetYear();

        $balances = array();
        foreach($clients as $clientid => $client) {

            $invoice_total = 0;
            $payment_total = 0;

            foreach ($invoices as $invoice) {
                if ($invoice->CustID == $clientid){
                    $invoice_total = $invoice->Total + $invoice_total;
                }
            }
            foreach ($payments as $payment) {
                if ($payment->CustID == $clientid){
                    $payment_total = $payment->Amount + $payment_total;
                }
            }

            $balances[$clientid] = array('Client' => $client, 'InvoiceTotal' => $invoice_total, 'PaymentTotal' => $payment_total, 'Balance' => $invoice_total-$payment_total);
        }

        return view('tablet/index')->with('jobs', $jobs)->with('invoices', $invoices)->with('clients', $clients)->with('products', $products)->with('balances', $balances);
    }
}
