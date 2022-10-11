<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControlPanel;
use App\Models\Client;
use App\Models\Job;
use App\Models\Job_Details;

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

        return view('jobs/index')->with('jobs', $jobs)->with('clients', $clients);
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

        $job = new Job;
        $job->date = date('Y-m-d');
        $job->status = '0';
        $job->custid = $request->input('custid');
        $job->emplid = 1;
        $job->save();

        //$job_detail = new Job_Details;
        //$job->OrderID;
        //$job->productid = $request->input('productid');
        //$job->price = $request->input('price');
        //$job->quantity = $request->input('quantity');
        //$job_detail->save();

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
