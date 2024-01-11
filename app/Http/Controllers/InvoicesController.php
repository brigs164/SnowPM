<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Job;
use App\Models\Client;

class InvoicesController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->CustID = $request->input("ClientID");
        $invoice->EmplID = 1;
        $invoice->Status = 2;
        $invoice->Total = $request->input("Total");
        $invoice->Date = now();

        $invoice->save();

        $invoiceID = Invoice::latest()->first()->id;

        $jobIDs = $request->input("jobID");

        $jobs = explode(',', $jobIDs);

        foreach ($jobs as $jobID) {
            
            $invoice_details = new Invoice_Details;
            $invoice_details->InvoiceID = $invoiceID;
            $invoice_details->JobID = $jobID;

            $invoice_details->save();

            $job = Job::find($jobID);

            if ($job->Status == 1) {
                $job->Status = '5';
                $job->save();
            }
        }

        return redirect()->route('tablet')->with('success', 'Invoice Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);

        $invoice_details = Invoice_Details::select('JobID')->where('InvoiceID', $id)->get();

        return view ('invoice.view')->with('invoice', $invoice);
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
        
        $id = $request->input('invoiceID');

        $invoice = Invoice::find($id);

        if ($invoice->Status == 2) {
            $invoice->Status = '3';
            $invoice->save();
            return redirect()->back()->with('success', 'Invoice Paid');
        }
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
