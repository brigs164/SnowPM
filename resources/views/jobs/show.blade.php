@extends('layouts.app')

@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Job</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Job</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
  <section class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    </h3>
                </div>
            <!-- /.box-header -->
                <div class="card-body">
                    Customer: {{$job->client->Name}}<Br>
                    Address: {{$job->client->Address}}, {{$job->client->City}}, {{$job->client->Zip}}<br>
                    Phone: {{$job->client->PhoneNumber}}<br>
                    Job Date: {{\Carbon\Carbon::parse($job->Date)->format('m-d-Y')}}<br>
                    Job ID: {{$job->id}}<br>
                    Job Status: {{$job->Status}}<br>
                    Employee ID: {{$job->EmplID}}
                </div>
            <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    </h3>
                </div>
            <!-- /.box-header -->
                <div class="card-body">
                    
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>
  </section>
@endsection
