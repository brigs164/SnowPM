@php
$invoiceCount = 0;
$paidCount = 0;
$invoiceTotalCount = 0;
$openCount = 0;
$completedCount = 0;
$jobCount = 0;
$toatlJobs = 0;
$expenses = 0;


foreach($invoices as $invoice){
    if($invoice->Status == "2"){
        $invoiceCount++;
    }
    elseif($invoice->Status == "3"){
        $paidCount++;
    }
}

$invoiceTotalCount = $invoiceCount + $paidCount;

foreach($jobs as $job){
    if($job->Status == "0"){
        $openCount++;
    }
    elseif($job->Status == "1"){
        $completedCount++;
    }
}

$jobCount = $completedCount + $openCount;

$totalJobs = count($jobs);

$expenseTotals = array_values($expenseTotals);
$invoicePendingTotals = array_values($invoicePendingTotals);
$invoiceFinalTotals = array_values($invoiceTotals);

@endphp

@extends('layouts.app')

@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
<section class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Profit</span>
                    <span class="info-box-number">
                    $@php echo array_sum($invoiceFinalTotals)-array_sum($expenseTotals) @endphp
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="far fa-credit-card"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Expenses</span>
                    <span class="info-box-number">
                        $@php echo array_sum($expenseTotals) @endphp
                    </span>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="far fa-money-bill-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Income</span>
                        <span class="info-box-number">
                            $@php echo array_sum($invoiceFinalTotals) @endphp
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clock"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pending</span>
                        <span class="info-box-number">
                            $@php echo array_sum($invoicePendingTotals) @endphp
                        </span>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Monthly Recap Report</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a href="#" class="dropdown-item">Action</a>
                                <a href="#" class="dropdown-item">Another action</a>
                                <a href="#" class="dropdown-item">Something else here</a>
                                <a class="dropdown-divider"></a>
                                <a href="#" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Income/Expenses</strong>
                            </p>
                            <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 661px;" width="661" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4 m-0">
                            <p class="text-center m-0" style="line-height: 1">
                                <strong>Total Jobs</strong> - {{$totalJobs}}
                            </p>
                        <div class="progress-group">
                            Open Jobs
                            <span class="float-right"><b>{{$openCount}}</b>/{{$jobCount}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" style="width: @php if ($jobCount > 0) { echo ($openCount / $jobCount) * 100; } @endphp%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            Completed Jobs
                            <span class="float-right"><b>{{$completedCount}}</b>/{{$jobCount}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" style="width: @php if ($jobCount > 0) { echo ($completedCount / $jobCount) * 100; } @endphp%"></div>
                            </div>
                        </div>
                        <div class="progress-group m-0">
                            <p class="text-center" style="line-height: 1; margin: 20px 0 0 0;">
                                <strong>Total Invoices</strong> - {{$invoiceTotalCount}}
                            </p>
                        </div>
                        <div class="progress-group">
                            <span class="progress-text">Invoiced</span>
                            <span class="float-right">
                                <b>{{$invoiceCount}}</b>/{{$invoiceTotalCount}}
                            </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-info" style="width: @php if ($invoiceTotalCount > 0) { echo ($invoiceCount / $invoiceTotalCount) * 100; } @endphp%"></div>
                            </div>
                        </div>
                        <div class="progress-group">
                            Paid Invoices
                            <span class="float-right">
                                <b>{{$paidCount}}</b>/{{$invoiceTotalCount}}
                            </span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-green" style="width: @php if ($invoiceTotalCount > 0) { echo ($paidCount / $invoiceTotalCount) * 100; } @endphp%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> %</span>
                            <h5 class="description-header text-success">$@php echo array_sum($invoiceFinalTotals) @endphp</h5>
                            <span class="description-text">TOTAL REVENUE</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> %</span>
                            <h5 class="description-header text-danger">$@php echo array_sum($expenseTotals) @endphp</h5>
                            <span class="description-text">TOTAL EXPENSES</span>
                        </div> 
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> %</span>
                            <h5 class="description-header">$@php echo array_sum($invoiceFinalTotals)-array_sum($expenseTotals) @endphp</h5>
                            <span class="description-text">TOTAL PROFIT</span>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6">
                        <div class="description-block">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> %</span>
                            <h5 class="description-header">$0 / $1000</h5>
                            <span class="description-text">GOAL PROFIT</span>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</section>
@endsection

@section('third_party_scripts')
    <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>
    <!-- <script src="{{ mix('/js/dashboard.js') }}" defer></script> -->
    <script>
    $(function(){'use strict'

        var invoice = <?php echo json_encode($invoiceFinalTotals); ?>;

        var salesChartCanvas=$('#salesChart').get(0).getContext('2d')

        var salesChartData={
            labels:['January','February','March','April','May','June','July','August','September','October','Novemeber','December'],
            datasets:[
                {label:'INCOME',backgroundColor:'rgba(60,141,188,0.9)',
                borderColor:'rgba(60,141,188,0.8)',
                pointRadius:false,
                pointColor:'#3b8bba',
                pointStrokeColor:'rgba(60,141,188,1)',
                pointHighlightFill:'#fff',pointHighlightStroke:'rgba(60,141,188,1)',
                data:invoice},
                {label:'EXPENSES',backgroundColor:'rgba(210, 214, 222, 1)',
                borderColor:'rgba(210, 214, 222, 1)',pointRadius:false,pointColor:'rgba(210, 214, 222, 1)',
                pointStrokeColor:'#c1c7d1',pointHighlightFill:'#fff',pointHighlightStroke:'rgba(220,220,220,1)',
                data:[]}
            ]
        }

        var salesChartOptions={
            maintainAspectRatio:false,
            responsive:true,
            legend:{display:false},
            scales:{xAxes:[{gridLines:{display:false}}],
            yAxes:[{gridLines:{display:false}}]}}

        var salesChart=new Chart(salesChartCanvas,{type:'line',data:salesChartData,options:salesChartOptions})
    })
    </script>
@endsection