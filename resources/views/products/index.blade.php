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
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              {!! Form::open(['action' => 'App\Http\Controllers\ProductsController@store', 'method' => 'POST']) !!}
              <table class="table m-0">
                <tbody>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tr>
                    <td>{{Form::text('name', '', ['class' => 'form-control'])}}</td>
                    <td>{{Form::text('description', '', ['class' => 'form-control'])}}</td>
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