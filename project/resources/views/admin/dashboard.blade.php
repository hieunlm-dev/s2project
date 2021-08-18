@extends('admin.layout.layout')

@section('contents')
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
                                        $count =0;
                                      @endphp
                                      @foreach($orders as $item)
                                      @if (isset($item))
                                          @php
                                              $count++;
                                          @endphp
                                      @endif
                                      @endforeach
                                        <h3>
                                          {{$count}}
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
                                          $total=0;
                                      @endphp
                                      @foreach ($orders as $item)
                                          @if (isset($item))
                                          @php                                             
                                              $total += $item->grand_total;
                                          @endphp
                                          @endif
                                      @endforeach
                                        <h3>
                                          {{number_format($total,0,'','.')}}
                                          <sup style="font-size: 20px">đ</sup></h3>
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
                                        $count =0;
                                      @endphp
                                      @foreach($customers as $item)
                                      @if (isset($item))
                                          @php
                                              $count++;
                                          @endphp
                                      @endif
                                      @endforeach
                                        <h3>{{$count}}</h3>

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
                                        $count =0;
                                      @endphp
                                      @foreach($accounts as $item)
                                      @if (isset($item))
                                          @php
                                              $count++;
                                          @endphp
                                      @endif
                                      @endforeach
                                        <h3>{{$count}}</h3>

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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
