@extends('backpack::layout') @section('header')
<section class="content-header">
    <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
    </ol>
</section> @endsection @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
            </div>
            <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
        </div>
    </div>
</div>


<div class ="row">
<div class="col-md-6">
    <div class="box-body info-box">
        <div class="chart-responsive">
            <canvas id="pieChart" height="165" width="199"> </canvas>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="info-box ">
        <!-- Apply any bg-* class to to the icon to color it --><span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
        <div class="info-box-content"> <span class="info-box-text">Nombre adhérents actif</span> <span class="info-box-number">{{$userActif}}</span> </div>
    </div>
</div>


<div class="col-md-6">
    <div class="box-body info-box">
        <div class="chart-responsive">
            <canvas id="graphChart" width="1500" height="1000"></canvas>
        </div>
    </div>


</div>

</div>
@endsection

 @section('after_scripts')
<script>
     var ctx = document.getElementById("pieChart");


 var myDoughnutChart = new Chart(ctx, {
     type: 'doughnut',
     data: {
        labels: {!!$district_labels!!},
        datasets: [{
            data: {!!$district!!},
            backgroundColor:{!!$district_colors!!}
        }]
     }, 
     options: {
         animation: {
             animateScale: true
         }
     }
 });
    
var ctx = document.getElementById("graphChart");
     var myDoughnutChart = new Chart(ctx, {
        type:'line'
      ,data: {
         labels: ["0-10", "11-20", "21-30", "31-40", "41-50", "51-60", "61-70"],
    datasets: [
        {
            label: "personnes par tranches d'âge",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            data: {!!$agepersonne!!}
        }
    ]
 }});
</script>@endsection










