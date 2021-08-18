@extends('admin.layout.layout')

@section('contents')
    {{-- @php
        dd($incomes);
    @endphp --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($orders as $item)
                                            @if (isset($item))
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <h3>
                                            {{ $count }}
                                        </h3>
                                        <p>New Orders this week</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($orders as $item)
                                            @if (isset($item) && $item->status == 'completed')
                                                @php
                                                    $total += $item->grand_total;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <h3>
                                            {{ number_format($total, 0, '', '.') }}
                                            <sup style="font-size: 20px">đ</sup>
                                        </h3>
                                        <p>Incoming this week</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($customers as $item)
                                            @if (isset($item))
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <h3>{{ $count }}</h3>

                                        <p>Customers Registrations this week</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($accounts as $item)
                                            @if (isset($item))
                                                @php
                                                    $count++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <h3>{{ $count }}</h3>

                                        <p>Staff and management</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                    </div><!-- /.container-fluid -->
                </section>
            </div>
            <div class="card-body p-0">
                <section class="content">
                    <div class="container-fluid">
                    </div>
                    <div class="container">
                        <h3>Income in 7 days</h3>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
@section('admin-scripts')
    <script>
        // var values1 = new Intl.NumberFormat('vi-VN', {
        //     style: 'currency',
        //     currency: 'VNĐ',
        // }).format('{{ $incomes1 }}'); // '€ 10,000.00' ;
        const format = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        });
        var max = format.format(1000000000);
        var valueArr = ['{{ $incomes1 }}', '{{ $incomes2 }}', '{{ $incomes3 }}', '{{ $incomes4 }}',
            '{{ $incomes5 }}', '{{ $incomes6 }}', '{{ $incomes7 }}'
        ];
        // for (var i = 0; i < valueArr.length; i++){
        //     valueArr[i] = format.format(valueArr[i]);
        // }
        var xValues = ['Day1', 'Day2', 'Day3', 'Day4', 'Day5', 'Day6', 'Day7'];
        var yValues = [valueArr[0], valueArr[1], valueArr[2], valueArr[3], valueArr[4], valueArr[5], valueArr[6]];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: valueArr
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            // min: 0,
                            // max: 100000000,
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                if (parseInt(value) >= 1000) {
                                    return 'đ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                } else {
                                    return 'đ' + value;
                                }
                            }
                        }
                    }],
                }
            }
        });
    </script>
@endsection
