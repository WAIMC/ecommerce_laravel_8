{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Dashboard')
@section('action', 'Admin')


    {{-- main section for master layout --}}
@section('main')

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalOrder->count() }}</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('order.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalReview }}</h3>

                    <p>Comment</p>
                </div>
                <div class="icon text-white">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </div>
                <a href="{{ route('review.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalCustomer }}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ route('customer_management.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalProduct }}</h3>

                    <p>Products</p>
                </div>
                <div class="icon text-white">
                    <i class="fas fa-barcode"></i>
                </div>
                <a href="{{ route('product.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sales Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 324px;"
                            width="648" height="500" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <!-- DONUT CHART -->
             <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Category</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>

        <div class="col-md-6">
            
             <!-- jQuery Knob -->
             <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Status Invoices
                  </h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-6 col-md-6 text-center">
                      <input id="wait" type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc">
  
                      <div class="knob-label">Awaiting Fulfillment</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 col-md-6 text-center">
                      <input id="canncel" type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#f56954">
  
                      <div class="knob-label">Cannceled</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
  
                  <div class="row">
                    <div class="col-6 text-center">
                      <input id="ship" type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#932ab6">
  
                      <div class="knob-label">Awaiting Shipment</div>
                    </div>
                    <!-- ./col -->
                    <div class="col-6 text-center">
                      <input id='complete' type="text" class="knob" value="" data-width="90" data-height="90" data-fgColor="#39CCCC">
  
                      <div class="knob-label">Complete</div>
                    </div>
                    <!-- ./col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

        </div>
    </div>
@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
  {{-- js here --}}
  <script>
    $(function() {


      var order = {!! json_encode($order_detail->toArray()) !!};
      var label = [];
      var data_main = [];
      const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      order.forEach(element => {
        
        label.push(new Date(""+element['created_at']+"").getUTCFullYear() + "/" + new Date(""+element['created_at']+"").getUTCMonth() + " / " +new Date(""+element['created_at']+"").getUTCDay() );
        data_main.push( element['price']*element['quantity'] );

      });

        /* ChartJS
          * -------
          * Here we will create a few charts using ChartJS
          */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: label,
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: data_main
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })





        var category = {!! json_encode($category->toArray()) !!};
        var labels_category = [];
        category.forEach(catg => {
            labels_category.push(catg['name']);
        });
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
        labels: labels_category,
        datasets: [
            {
            data: [3,3,3,3,3],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
        ]
        }
        var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
        })


        /* jQueryKnob */

        var total_order = {{$totalOrder->count()}};
        var status_waiting = {{$totalOrder->where('status',0)->count()}};
        var status_shipping = {{$totalOrder->where('status',1)->count()}};
        var status_completing = {{$totalOrder->where('status',2)->count()}};
        var status_cannceling = {{$totalOrder->where('status',3)->count()}};
        $('#wait').val(100*status_waiting/total_order);
        $('#ship').val(100*status_shipping/total_order);
        $('#complete').val(100*status_completing/total_order);
        $('#canncel').val(100*status_cannceling/total_order);

        $('.knob').knob({
        /*change : function (value) {
        //console.log("change : " + value);
        },
        release : function (value) {
        console.log("release : " + value);
        },
        cancel : function () {
        console.log("cancel : " + this.value);
        },*/

        draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

            var a   = this.angle(this.cv)  // Angle
                ,
                sa  = this.startAngle          // Previous start angle
                ,
                sat = this.startAngle         // Start angle
                ,
                ea                            // Previous end angle
                ,
                eat = sat + a                 // End angle
                ,
                r   = true

            this.g.lineWidth = this.lineWidth

            this.o.cursor
            && (sat = eat - 0.3)
            && (eat = eat + 0.3)

            if (this.o.displayPrevious) {
                ea = this.startAngle + this.angle(this.value)
                this.o.cursor
                && (sa = ea - 0.3)
                && (ea = ea + 0.3)
                this.g.beginPath()
                this.g.strokeStyle = this.previousColor
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
                this.g.stroke()
            }

            this.g.beginPath()
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
            this.g.stroke()

            this.g.lineWidth = 2
            this.g.beginPath()
            this.g.strokeStyle = this.o.fgColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
            this.g.stroke()

            return false
            }
        }
        })
        /* END JQUERY KNOB */

        //INITIALIZE SPARKLINE CHARTS
        var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
        var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
        var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

        sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
        sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
        sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])


    });
  </script>
@stop
