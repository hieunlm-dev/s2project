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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                                        <p>New Orders in 7 days</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('admin.order.index') }}" class="small-box-footer">More info <i
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
                                            <sup style="font-size: 20px">??</sup>
                                        </h3>
                                        <p>Incoming in 7 days</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ route('admin.order.index') }}" class="small-box-footer">More info <i
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

                                        <p>Customers Registrations in 7 days</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ route('admin.customer.index') }}" class="small-box-footer">More info <i
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
                                    <a href="{{ route('admin.account.index') }}" class="small-box-footer">More info <i
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
                    <div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="container">
                                    <h3 align="center">Income in 7 days</h3>
                                </div>
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="container">
                                    <h3 align="center">Statistics of Orders</h3>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <td>Status</td>
                                        <td>Quantity</td>
                                        <td>Percent</td>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count1 = 0;
                                            $count2 = 0;
                                            $count3 = 0;
                                            $count4 = 0;
                                        @endphp
                                        @foreach ($orders as $item)
                                            @if (isset($item) && $item->status == 'pending')
                                                @php
                                                    $count1++;
                                                @endphp
                                            @endif
                                            @if (isset($item) && $item->status == 'completed')
                                                @php
                                                    $count2++;
                                                @endphp
                                            @endif
                                            @if (isset($item) && $item->status == 'decline')
                                                @php
                                                    $count3++;
                                                @endphp
                                            @endif
                                            @if (isset($item) && $item->status == 'processing')
                                                @php
                                                    $count4++;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $total = $count1 + $count2 + $count3 + $count4;
                                        @endphp
                                        <tr>
                                            <th>
                                                Pending
                                            <td>
                                                {{ $count1 }}
                                            </td>
                                            <td>
                                                @if ($total == 0)
                                                    @php
                                                        echo 'N/A';
                                                    @endphp
                                                @elseif ($total>0)
                                                    {{ number_format($count1 / $total, 2) * 100 }}%
                                                @endif
                                            </td>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Processing
                                            <td>
                                                {{ $count4 }}
                                            </td>
                                            <td>
                                                @if ($total == 0)
                                                    @php
                                                        echo 'N/A';
                                                    @endphp
                                                @elseif ($total>0)
                                                    {{ number_format($count4 / $total, 2) * 100 }}%
                                                @endif

                                            </td>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Completed
                                            <td> {{ $count2 }}</td>
                                            <td>
                                                @if ($total == 0)
                                                    @php
                                                        echo 'N/A';
                                                    @endphp
                                                @elseif ($total>0)
                                                    {{ number_format($count2 / $total, 2) * 100 }}%
                                                @endif
                                            </td>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                Decline
                                            <td>{{ $count3 }}</td>
                                            <td>
                                                @if ($total == 0)
                                                    @php
                                                        echo 'N/A';
                                                    @endphp
                                                @elseif ($total>0)
                                                    {{ number_format($count3 / $total, 2) * 100 }}%
                                                @endif
                                            </td>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="container">
                                    <h3 align="center">Customer Comment</h3>
                                </div>
                                <table class="table table-hover table-striped">
                                    <td>Time</td>
                                    <td>Action</td>
                                    <td>Product</td>
                                    <td>Contents</td>
                                   
                                    @forelse ($cmts as $item)
                                        <tr>
                                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $item->username }} has comment about</td>
                                            <td> <a href="{{ route('product-details', $item->pid) }}">{{ $item->name }}
                                                </a></td>
                                            <td>
                                                @if (strlen($item->contents) < 30)
                                                    {{ $item->contents }} @else{{ substr($item->contents, 0, -15) }} ...
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No comments</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="container">
                                    <h3 align="center">Chain Stores</h3>
                                    <table class="table table-striped">
                                        <tr>
                                            <th style="text-align: center"><span align="center">Store</span></th>
                                        </tr>
                                       <tr> <td><span>590 C??ch M???ng Th??ng T??m, Ph?????ng 11, Qu???n 3, Th??nh ph??? H??? Ch?? Minh</span></td></tr>
                                       <tr> <td><span>S??? 8A T??n Th???t Thuy???t, M??? ????nh, Nam T??? Li??m, H?? N???i 100000</span></td></tr>
                                    </table>
                                </div>
                            </div>
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
        //     currency: 'VN??',
        // }).format('{{ $incomes1 }}'); // '??? 10,000.00' ;
        // const format = new Intl.NumberFormat('en');
        // var max = format.format(1000000000);


        console.log(valueArr);
        var xValues = ['Day1', 'Day2', 'Day3', 'Day4', 'Day5', 'Day6', 'Day7'];
        var valueArr = ['{{ $incomes7 }}', '{{ $incomes6 }}', '{{ $incomes5 }}', '{{ $incomes4 }}',
            '{{ $incomes3 }}', '{{ $incomes2 }}', '{{ $incomes1 }}'
        ];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: valueArr,
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
                                    return '??' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                } else {
                                    return '??' + value;
                                }
                            }
                        }
                    }],
                }
            }
        });
      
    </script>
@endsection
