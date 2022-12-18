<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlPanel;
use App\Models\Client;
use App\Models\Job;
use App\Models\Job_Details;
use App\Models\Product;

class JobsController extends Controller
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
        $clients = Client::all()->where('Status', '1')->pluck('Name', 'id');
        $products = Product::all()->pluck('Name', 'id')->reverse();

        return view('jobs/index')->with('jobs', $jobs)->with('clients', $clients)->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all()->where('Status', '1')->pluck('Name', 'id');

        return view ('jobs.create')->with('clients', $clients);
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

        $customerID = $request->input('custid');

        $job = new Job;
        $job->date = date('Y-m-d');
        $job->status = '0';
        $job->custid = $customerID;
        $job->emplid = 1;
        $job->save();

        $job_detail = new Job_Details;
        $job_detail->jobid = Job::latest()->first()->id;
        $job_detail->productid = $request->input('prodid');

        $job_detail->save();

        return redirect()->back()->with('success', 'Job Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $job_detail = Job_Details::where('JobID', $id)->first();

        return view('jobs.show')->with('job', $job)->with('job_detail', $job_detail);
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
        
        $id = $request->input('jobid');

        $job = Job::find($id);

        if ($job->Status == 0) {
            $job->Status = '1';
            $job->save();
            return redirect()->back()->with('success', 'Job Completed');
        }
        else if ($job->Status == 1){

            $custid = $job->CustID;

            $jobs = Job::where('custid', $custid)->where('Status', 1)->get();

            $client = Client::find($custid);

            return view('invoice/create')->with('jobs', $jobs)->with('client', $client);
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
