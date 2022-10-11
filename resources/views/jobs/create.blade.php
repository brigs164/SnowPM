@extends('layouts.app')

@section('content_header')

  <h1>
    Jobs
    <small>Job</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><i class="fa fa-file-text"></i> Jobs</li>
  </ol>

@endsection

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Jobs</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            {!! Form::open(['action' => 'App\Http\Controllers\JobsController@store', 'method' => 'POST']) !!}
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Date</th>
                  <th>Client</th>
                </tr>
                <tr>
                  <th>{{Form::select('custid', $clients, null, ['class' => 'form-control']) }}</th>
                  <th>{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}</th>
                </tr>
              </tbody>
            </table>
            {!! Form::close() !!}
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
@endsection