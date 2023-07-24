@extends('layouts.app')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Tablet Mode</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-blue btn-lg" data-toggle="modal" data-target="#new_job">New Job</button>
                    </div>
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-info btn-lg" data-toggle="modal" data-target="#new_product">New Product</button>
                    </div>
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-navy btn-lg" data-toggle="modal" data-target="#new_expense">New Expense</button>
                    </div>
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-orange btn-lg" data-toggle="modal" data-target="#new_customer">New Customer</button>
                    </div>
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-green btn-lg" data-toggle="modal" data-target="#payment">Payment</button>
                    </div>
                    <div class="col-lg-2 col-6">
                        <button type="button" class="btn btn-block bg-warning btn-lg" data-toggle="modal" data-target="#accounts">Accounts</button>
                    </div>
                </div>
            </div>
        </div>

        @for ($i = 0; $i < 4; $i++)
            @if ($i == 0 || $i == 2)
                <div class="row">
            @endif
                <div class="col-sm-12 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                @if ($i == 0)
                                    Open Jobs
                                @elseif ($i == 1)
                                    Completed Jobs
                                @elseif ($i == 2)
                                    Invoices
                                @else
                                    Paid
                                @endif
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="@php echo "joblist" . $i @endphp" class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Client</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($jobs) > 0)
                                            @foreach($jobs as $job)
                                                @if ($job->Status == $i)
                                                    <tr>
                                                        <td class="col-1">
                                                            {{$job->id}}
                                                        </td>
                                                        <td class="col-4">
                                                            
                                                        </td>
                                                        <td class="col-2">
                                                            {{\Carbon\Carbon::parse($job->Date)->format('m-d-y')}}
                                                        </td>
                                                        <td class="col-3">
                                                            {{$job->client->Name}}
                                                        </td>
                                                        <td class="col-1">
                                                            <?php
                                                                if($job->Status == "0"){
                                                                    echo "<span class='badge btn-block bg-danger'><big>Open</big></span>";
                                                                }
                                                                else if($job->Status == "1"){
                                                                    echo "<span class='badge btn-block badge-warning'><big>Completed</big></span>";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td class="col-1">
                                                            {!! Form::open(['action' => ['App\Http\Controllers\JobsController@update', $job->id], 'method' => 'POST']) !!}   
                                                            <div class="btn-group">
                                                                <a href="/jobs/{{$job->id}}" class="btn btn-sm bg-teal" role="button">View</a>
                                                                <a href="/jobs/{{$job->id}}" class="btn btn-sm bg-gray" role="button">Edit</a>
                                                                @if($job->Status == "0")
                                                                    {{Form::hidden('jobid', $job->id)}}
                                                                    {{Form::hidden('_method', 'PUT')}}
                                                                    {{Form::submit('Complete', ['class' => 'btn btn-sm bg-primary'])}}
                                                                @elseif($job->Status == "1")
                                                                    {{Form::hidden('jobid', $job->id)}}
                                                                    {{Form::hidden('_method', 'PUT')}}
                                                                    {{Form::submit('Invoice', ['class' => 'btn btn-sm bg-primary'])}}
                                                                @endif
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif

                                        @if(count($invoices) > 0)
                                            @foreach($invoices as $invoice)
                                                @if ($invoice->Status == $i)
                                                    <tr>
                                                        <td class="col-1">
                                                            {{$invoice->id}}
                                                        </td>
                                                        <td class="col-4">
                                                            
                                                        </td>
                                                        <td class="col-2">
                                                            {{\Carbon\Carbon::parse($invoice->Date)->format('m-d-y')}}
                                                        </td>
                                                        <td class="col-3">
                                                            {{$invoice->client->Name}}
                                                        </td>
                                                        <td class="col-1">
                                                            <?php
                                                                if($invoice->Status == "2"){
                                                                    echo "<span class='badge btn-block badge-info'><big>Invoiced</big></span>";
                                                                }
                                                                else if($invoice->Status == "3"){
                                                                    echo "<span class='badge btn-block bg-green'><big>Paid</big></span>";
                                                                }
                                                            ?>
                                                        </td>
                                                        <td class="col-1">
                                                            {!! Form::open(['action' => ['App\Http\Controllers\InvoicesController@update', $invoice->id], 'method' => 'POST']) !!}   
                                                            <div class="btn-group">
                                                                <a href="/invoice/{{$invoice->id}}" class="btn btn-sm bg-teal" role="button">View</a>
                                                                <a href="/invoice/{{$invoice->id}}" class="btn btn-sm bg-gray" role="button">Edit</a>
                                                                @if($invoice->Status == "2")
                                                                    {{Form::hidden('invoiceID', $invoice->id)}} 
                                                                    {{Form::hidden('_method', 'PUT')}}
                                                                    {{Form::submit('Paid', ['class' => 'btn btn-sm bg-primary'])}}
                                                                @endif
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                @if ($i == 1 || $i == 3)
                </div>
            @endif
        @endfor

    <div class="modal fade" id="new_job" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title">New Job</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                {!! Form::open(['action' => 'App\Http\Controllers\JobsController@store', 'method' => 'POST']) !!}
                    <div class="row">
                        {{Form::label('custid', 'Customer:', ['class' => 'form-control bg-secondary col-sm-3'])}}
                        {{Form::select('custid', $clients, null, ['class' => 'form-control col-sm-9']) }}
                    </div>
                    <div class="row">
                        {{Form::label('prodid', 'Product:', ['class' => 'form-control bg-secondary col-sm-3'])}}
                        {{Form::select('prodid', $products, null, ['class' => 'form-control col-sm-9']) }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class' => 'btn btn-outline-light'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="new_product" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">New Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                {!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store', 'method' => 'POST']) !!}
                    <div class="row">
                        {{Form::label('name', 'Name:', ['class' => 'form-control bg-secondary col-sm-3'])}}
                        {{Form::text('name', '', ['class' => 'form-control col-sm-9'])}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class' => 'btn btn-outline-light'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="new_expense" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-navy">
                    <h4 class="modal-title">New Expense</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                    <p>Date</p>
                    <p>Description</p>
                    <p>Amount</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="new_customer" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h4 class="modal-title">New Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                {!! Form::open(['action' => 'App\Http\Controllers\ClientsController@store', 'method' => 'POST',]) !!}
                    <div class="row">
                        {{Form::label('name', 'Name:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('name', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('address', 'Address:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('address', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('city', 'City:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('city', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('state', 'State:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('state', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('zip', 'Zip:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('zip', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('phone', 'Phone:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('phone', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                    <div class="row">
                        {{Form::label('rate', 'Rate:', ['class' => 'form-control bg-secondary col-sm-2'])}}
                        {{Form::text('rate', '', ['class' => 'form-control col-sm-10'])}}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class' => 'btn btn-outline-light'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="modal fade" id="payment" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header bg-green">
                    <h4 class="modal-title">Payment</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                    <p>Date</p>
                    <p>Customer</p>
                    <p>Amount</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accounts" style="display: none;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title">Over Due Accounts</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body bg-secondary">
                    <p>Customer</p>
                    <p>Amount Over Due</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-light">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
