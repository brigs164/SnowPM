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
      </div>
      <div class="card-body">
        <div class="col-lg-1 col-lg-offset-5">
          <a href="/jobs/create" class="btn btn-block btn-primary" role="button">New Job</a>
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
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table id="@php echo "joblist" . $i @endphp" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Client</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($jobs) > 0)
                    @foreach($jobs as $job)
                      @if ($job->job_status->Status == $i)
                        <tr>
                          <td>
                            {{$job->id}}
                          </td>
                          <td>
                            {{$job->JobDescription}}
                          </td>
                          <td>
                            {{$job->Date}}
                          </td>
                          <td>
                            {{$job->client->Name}}
                          </td>
                          <td>
                            <?php
                                if($job->job_status->Status == "0"){
                                    echo "<span class='label bg-gray'><big>Open</big></span>";
                                }
                                else if($job->job_status->Status == "1"){
                                    echo "<span class='label label-warning'><big>Closed</big></span>";
                                }
                                else if($job->job_status->Status == "2"){
                                    echo "<span class='label label-info'><big>Invoiced</big></span>";
                                }
                                else if($job->job_status->Status == "3"){
                                    echo "<span class='label label-success'><big>Paid</big></span>";
                                }
                            ?>
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
                  <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
              </table>
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