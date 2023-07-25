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
                        Client
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <p>Customer: {{$job->client->Name}}</p>
                    <p>Address: {{$job->client->Address}} {{$job->client->City}}, {{$job->client->State}} {{$job->client->Zip}}</p>
                    <p>Phone: {{$job->client->PhoneNumber}}</p>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-block bg-green btn-lg" data-toggle="modal" data-target="#new_job">Complete Job</button>
                    <button type="button" class="btn btn-block bg-yellow btn-lg" data-toggle="modal" data-target="#new_job">Edit Job</button>
                    <button type="button" class="btn btn-block bg-red btn-lg" data-toggle="modal" data-target="#new_job">Delete Job</button>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Job
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <p>Job ID: {{$job->id}}</p>
                    <p>Job Date: {{\Carbon\Carbon::parse($job->Date)->format('m-d-Y')}}</p>
                    <p>Job Status: {{$job->Status}}</p>
                    <p>Product ID: {{$job_detail->ProductID}}</p>
                    <p>Employee ID: {{$job->EmplID}}</p>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <?php
                        $address = $job->client->Address . " " . $job->client->City . " " . $job->client->State . " " . $job->client->Zip;
                        $address = str_replace(" ", "+", $address);
                    ?>
                    <iframe width="100%" height="600" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </div>
  </section>
@endsection
