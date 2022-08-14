@extends('layouts.app')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Clients</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Clients</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
  <section class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Clients</h3>
          </div>
          <!-- /.box-header -->
          <div class="card-body">
            <table id="clients" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Phone</th>				  
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($clients) > 0)
                    @foreach($clients as $client)
                      <tr>
                        <td>
                          {{$client->ClientID}}
                        </td>
                        <td>
                          {{$client->Name}}
                        </td>
                        <td>
                          {{$client->Address}}
                        </td>
                        <td>
                          {{$client->City}}
                        </td>
                        <td>
                          {{$client->PhoneNumber}}
                        </td>
                        <td>
                        <a href="/clients/{{$client->id}}" class="btn btn-block btn-primary">View</a>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td>
                        No Clients
                      </td>
                    </tr>
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Phone</th>				  
                    <th>Options</th>
                  </tr>
                </tfoot>
            </table>
          </div>
          <div class="card-footer clearfix">
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">New Client</h3>
          </div>
          <!-- /.box-header -->
          <div class="card-body table-responsive">
            {!! Form::open(['action' => 'App\Http\Controllers\ClientsController@store', 'method' => 'POST']) !!}
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip</th>
                  <th>Phone</th>
                  <th>Rate</th>
                  <th></th>
                </tr>
                <tr>
                  <th>{{Form::text('name', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('address', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('city', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('state', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('zip', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('phone', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('rate', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}</th>
                </tr>
              </tbody>
            </table>
            {!! Form::close() !!}
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('third_party_scripts')

<script>
  $(function () {
    $('#clients').DataTable({
      "paging": true,
	    "order": [[ 0, "desc" ]]})
  })
</script>
@endsection