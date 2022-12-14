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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Clients</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table id="clients" class="table m-0">
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
                  </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">New Client</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              {!! Form::open(['action' => 'App\Http\Controllers\ClientsController@store', 'method' => 'POST']) !!}
              <table class="table m-0">
                <thead>
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
                </thead>
                <tbody>
                  <tr>
                    <td>{{Form::text('name', '', ['class' => 'form-control'])}}</td`>
                    <td>{{Form::text('address', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('city', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('state', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('zip', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('phone', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('rate', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::submit('Submit', ['class' => 'btn btn-block btn-primary'])}}</td>
                  </tr>
                </tbody>
              </table>
              {!! Form::close() !!}
            </div>
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