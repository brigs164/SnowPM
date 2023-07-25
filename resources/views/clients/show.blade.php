@extends('layouts.app')

@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Client</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Client</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
    <section class="content-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="customer-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Summary" role="tab" aria-controls="customer-tab-summary" aria-selected="true">Summary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Jobs" role="tab" aria-controls="customer-tab-jobs" aria-selected="false">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Invoices" role="tab" aria-controls="customer-tab-invoices" aria-selected="false">Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Ledger" role="tab" aria-controls="customer-tab-ledgar" aria-selected="false">Ledger</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#Edit" role="tab" aria-controls="customer-tab-edit" aria-selected="false">Edit</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="Summary" role="tabpanel" aria-labelledby="customer-tab-summary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <center><i class="fa fa-archive"></i></center>
                                                <center>Status: {{$client->ClientActive}}</center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <center><i class="fa fa-file-invoice"></i></center>
                                                <center>Invoices Due:</center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <center><i class="fa fa-money-bill"></i></center>
                                                <center>Rate: ${{$client->Rate}}</center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <center><i class="fa fa-question"></i></center>
                                                <center>???</center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3>Client Info</h3>
                                                <p>ID #: {{$client->ClientID}}</p>
                                                <p>Name: {{$client->Name}}</p>
                                                <p>Address: {{$client->Address}}</p>
                                                <p>City: {{$client->City}}</p>
                                                <p>State: {{$client->State}}</p>
                                                <p>Zip: {{$client->Zip}}</p>
                                                <p>Phone: {{$client->PhoneNumber}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php
                                                        $address = $client->Address . " " . $client->City . " " . $client->State . " " . $client->Zip;
                                                        $address = str_replace(" ", "+", $address);
                                                ?>
                                                <iframe width="100%" height="600" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="Jobs" class="tab-pane">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                @if ($i == 0)
                                                    Open Jobs
                                                @elseif ($i == 1)
                                                    Completed Jobs
                                                @elseif ($i == 2)
                                                    Invoiced
                                                @else
                                                    Paid
                                                @endif
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="joblist" class="table table-bordered table-striped">
                                            </table>
                                        </div>
                                    </div>                                    
                                @endfor
                            </div>

                            <div class="tab-pane fade" id="Invoices" class="tab-pane">
                                <h3>Menu 2</h3>
                                <p>Test2.</p>
                            </div>

                            <div class="tab-pane fade" id="Ledger" class="tab-pane">
                                <h3>Menu 3</h3>
                                <p>Test3.</p>
                            </div>

                            <div class="tab-pane fade" id="Edit" class="tab-pane">
                                <h3>Menu 4</h3>
                                <p>Test4.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="small-box bg-green">
                        <div class="icon" style="padding:0px; padding-left:10px;">
                            <i class="fas fa-money-bill" style="font-size:75px; margin:0px;"></i>
                        </div>
                        <div class="inner">
                            <h2 style="padding-top:10px; color:white;">Balance</h2>
                            <p style="color:white;">$0.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="small-box bg-red">
                        <div class="icon" style="padding:0px; padding-left:10px;">
                            <i class="fas fa-money-bill" style="font-size:75px; margin:0px;"></i>
                        </div>
                        <div class="inner">
                            <h2 style="padding-top:10px; color:white;">Credit</h2>
                            <p style="color:white;">${{$client->Credit}}0.00</p>
                        </div>
                    </div>
                </div>		 
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection
