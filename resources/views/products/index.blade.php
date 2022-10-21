@extends('layouts.app')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
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
            <h3 class="card-title">Products</h3>
          </div>
          <!-- /.box-header -->
          <div class="card-body">
            <table id="clients" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                </tr>
                </thead>
                <tbody>
                  @if(count($products) > 0)
                    @foreach($products as $product)
                      <tr>
                        <td>
                          {{$product->id}}
                        </td>
                        <td>
                          {{$product->Name}}
                        </td>
                        <td>
                          {{$product->Description}}
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td>
                        No Products
                      </td>
                    </tr>
                  @endif
                </tbody>
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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">New Product</h3>
          </div>
          <!-- /.box-header -->
          <div class="card-body">
            {!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store', 'method' => 'POST']) !!}
            <table class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th></th>
                </tr>
                <tr>
                  <th>{{Form::text('name', '', ['class' => 'form-control'])}}</th>
                  <th>{{Form::text('description', '', ['class' => 'form-control'])}}</th>
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