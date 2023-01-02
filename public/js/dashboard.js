$(function(){'use strict'
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
        data:$invoiceTotals},
        {label:'EXPENSES',backgroundColor:'rgba(210, 214, 222, 1)',
        borderColor:'rgba(210, 214, 222, 1)',pointRadius:false,pointColor:'rgba(210, 214, 222, 1)',
        pointStrokeColor:'#c1c7d1',pointHighlightFill:'#fff',pointHighlightStroke:'rgba(220,220,220,1)',
        data:[65,59,80,81,56,55,40,20,15,20,25,50]}
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