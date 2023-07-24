@extends('layouts.app')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Invoice</h1>
                <small></small>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Invoice</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

@php ($total = 0)

<section class="content-fluid">
    <div class="invoice p-3 mb-3">

    <div class="row">
        <div class="col-12">
            <h4 style="border-bottom-style: solid; border-bottom-color: grey; padding-bottom: 9px;">
                Elite Winter Services
                <div class="float-right">Date: {{now()->format('m/d/Y')}}</div>
            </h4>
        </div>
    </div>

    <div class="row invoice-info" style="grey; padding-bottom: 9px;">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>Adam Brigman</strong><br>
                164 Baker St.<br>
                Marquette, MI 49855<br>
                Phone: (906) 869-4695<br>
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{$client->Name}}</strong><br>
                {{$client->Address}}<br>
                {{$client->City}}, {{$client->State}} {{$client->Zip}}<br>
                {{$client->PhoneNumber}}
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            <b>Invoice #:</b> 000000<br>
            <b>Account #:</b> {{$client->ClientID}}<br>
            <b>Payment Due:</b> Upon Receipt
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($jobs) > 0)
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->job_detail->product->Name}}</td>
                                <td>{{$job->job_detail->product->Date}}</td>
                                <td>${{$job->client->Rate}}</td>
                                <td>1</td>
                                <td>${{$job->client->Rate}}</td>
                                @php ($total = $job->client->Rate + $total)
                                @php ($jobIDs[] = $job->id)
                            </tr>
                        @endforeach
                    @else
                      <tr>
                        <td>
                          No Invoices
                        </td>
                      </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <p class="lead"></p>
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            </p>
        </div>

        <div class="col-4">
            <p class="lead"></p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{$total}}.00</td>
                        </tr>
                        <tr>
                            <th style="width:50%">Tax:</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th style="width:50%">Shipping:</th>
                            <td></td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${{$total}}.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @php ($jobID = implode(", ", $jobIDs))
    {{$jobID}}

    <div class="row no-print">
        <div class="col-12">
            {!! Form::open(['action' => 'App\Http\Controllers\InvoicesController@store', 'method' => 'POST']) !!}
            <a href="" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            {{Form::hidden('ClientID', $client->id)}}
            {{Form::hidden('jobID', $jobID)}}
            {{Form::hidden('Total', $total)}}
            {{Form::submit('Invoice', ['class' => 'btn btn-primary float-right'])}}
        </div>
    </div>
</div>
</section>
@endsection