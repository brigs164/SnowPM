@extends('layouts.app')

@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Control Panel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Control Panel</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body p-1">
                    {!! Form::open(['action' => 'App\Http\Controllers\ControlPanelController@store', 'method' => 'POST']) !!}
                    <table class="table m-0">
                        <tbody>
                            <tr>
                                <td class="">Year Setting</td>
                                <td class="pull-right">
                                    {{Form::select('year', array('2018' => '2018-2019','2019' => '2019-2020','2020' => '2020-2021',
                                                    '2021' => '2021-2022','2022' => '2022-2023','2023' => '2023-2024',
                                                    '2024' => '2024-2025'), null, ['class' => 'form-control'])}}
                                </td>
                            </tr>
                            <tr>
                                <td>Site Version</td>
                                <td class="text-right">v1.00.11a</td>
                            </tr>
                            <tr>
                                <td>phpMyAdmin</td>
                                <td class="text-right"><a class="btn btn-block btn-primary" role="button" href="../../phpmyadmin">Access</a>
                            </tr>
                            <tr>
                                <td></td>
                                <td>{{Form::submit('Save Settings', ['class' => 'btn btn-block btn-primary'])}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="customer-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#Accounts" role="tab" aria-controls="customer-tab-summary" aria-selected="true">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#Users" role="tab" aria-controls="customer-tab-summary" aria-selected="true">Users</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-header -->
                <div class="card-body no-padding">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Accounts">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>Account</th>
                                                <th>Description</th>
                                                <th>Begining Balance</th>
                                            <tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="Users">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>User Groups</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Users</th>
                                                <th>User Group</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection