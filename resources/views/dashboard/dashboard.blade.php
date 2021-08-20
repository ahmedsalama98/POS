@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.DASHBOARD')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.DASHBOARD')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.DASHBOARD')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      <div class="inner">
                        <h3>{{ $orders_count }}</h3>

                        <p>@lang('site.orders')</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{ route('dashboard.orders.index') }}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>


                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3>{{ $products_count }}</h3>

                        <p>@lang('site.products')</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>






                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{ $cusromers_count }}</h3>

                        <p>@lang('site.customers')</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{ route('dashboard.customers.index') }}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>


                  <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>{{  $admins_count }}</h3>

                        <p>@lang('site.MODERATOR')</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.show') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>


            </div>


                <div class="box">
                    <div class="box-header">

                        <h3> @lang('site.sales_graph')</h3>
                    </div>

                    <div class="box-body">

                        <div id="chart">

                        </div>
                    </div>
                </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->total_price }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
