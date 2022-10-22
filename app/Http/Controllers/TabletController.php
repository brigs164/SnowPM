<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ControlPanel;

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
        $clients = Client::all()->where('Status', '1')->pluck('Name', 'id');

        return view('tablet/index')->with('jobs', $jobs)->with('clients', $clients);
    }
}
