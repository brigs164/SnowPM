@extends('layouts.app')

@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Jobs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Jobs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
  <section class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">New Job</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          {!! Form::open(['action' => 'App\Http\Controllers\JobsController@store', 'method' => 'POST']) !!}
            <table class="table m-0">
              <thead>
                <tr>
                  <th>Client</th>
                  <th>Product</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{Form::select('custid', $clients, null, ['class' => 'form-control']) }}</td>
                  <td>{{Form::select('prodid', $products, null, ['class' => 'form-control']) }}</td>
                  <td>{{Form::submit('Submit', ['class' => 'btn btn-block btn-primary'])}}</td>
                </tr>
              </tbody>
            </table>
          {!! Form::close() !!}
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
                    Invoiced
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
                            <td>
                              {{$job->id}}
                            </td>
                            <td>
                              {{$job->JobDescription}}
                            </td>
                            <td>
                              {{\Carbon\Carbon::parse($job->Date)->format('m-d-y')}}
                            </td>
                            <td>
                              {{$job->client->Name}}
                            </td>
                            <td>
                              <?php
                                  if($job->Status == "0"){
                                      echo "<span class='badge btn-block bg-danger'><big>Open</big></span>";
                                  }
                                  else if($job->Status == "1"){
                                      echo "<span class='badge btn-block badge-warning'><big>Completed</big></span>";
                                  }
                                  else if($job->Status == "2"){
                                      echo "<span class='badge btn-block badge-info'><big>Invoiced</big></span>";
                                  }
                                  else if($job->Status == "3"){
                                      echo "<span class='badge btn-block badge-success'><big>Paid</big></span>";
                                  }
                              ?>
                            </td>
                            <td>
                            <a href="/jobs/{{$job->id}}" class="badge btn-block bg-blue"><big>View</big></a>
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    @else
                      <tr>
                        <td>
                          No Invoices
                        </td>
                      </tr>
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
  </section>
@endsection

@section('scripts')
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#joblist0').DataTable({
	  "order": [[ 0, "desc" ]]})
  });
  $(function () {
    $('#joblist1').DataTable({
	  "order": [[ 0, "desc" ]]})
  });
  $(function () {
    $('#joblist2').DataTable({
	  "order": [[ 0, "desc" ]]})
  });
  $(function () {
    $('#joblist3').DataTable({
	  "order": [[ 0, "desc" ]]})
  });
</script>
@endsection