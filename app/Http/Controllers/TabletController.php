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
        $products = Product::all()->pluck('Name', 'id')->reverse();

        return view('tablet/index')->with('jobs', $jobs)->with('invoices', $invoices)->with('clients', $clients)->with('products', $products);
    }
}
