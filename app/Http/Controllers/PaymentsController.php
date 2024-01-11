<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Job;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Client;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'custid' => 'required',
        ]);

        $custID = $request->input('custid');
        $pay = $request->input('amount');

        $invoices = Invoice::where('CustID', $custID)->where('Status', 2)->get();
        $jobs = Job::where('CustID', $custID)->where('Status', 1)->get();
        $client = Client::find($custID);


        foreach ($invoices as $invoice){

            if ($invoice->Total <= $pay){
                if ($invoice->Status == 2) {
                    $invoice->Status = '3';
                    $invoice->save();
                }
                $pay = $pay - $invoice->Total;
            }
        }

        if ($pay != 0) {
            if (count($jobs) >= 0) {
                foreach ($jobs as $job) {
                    if ($job->client->Rate <= $pay) {

                        $invoice = new Invoice;
                        $invoice->CustID = $custID;
                        $invoice->EmplID = 1;
                        $invoice->Status = 3;
                        $invoice->Total = $job->client->Rate;
                        $invoice->Date = now();

                        $invoice->save();

                        $invoiceID = Invoice::latest()->first()->id;
                        
                        $jobID = $job->id;

                        $invoice_details = new Invoice_Details;
                        $invoice_details->InvoiceID = $invoiceID;
                        $invoice_details->JobID = $jobID;

                        $invoice_details->save();

                        $job = Job::find($jobID);

                        if ($job->Status == 1) {
                            $job->Status = '5';
                            $job->save();
                        }

                        $pay = $pay - $job->client->Rate;
                    }
                }
            }
        }

        $payment = new Payment;
        $payment->CustID = $custID;
        $payment->amount = $request->input('amount');
        $payment->date = date('Y-m-d');
        $payment->save();

        return redirect()->back()->with('success', 'Payment Made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
