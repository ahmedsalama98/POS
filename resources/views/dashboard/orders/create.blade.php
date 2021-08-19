@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.create')  @lang('site.ORDERS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.create_order_to') {{ $customer->name }} </h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li><a href="{{ route('dashboard.orders.index') }}"> <i class="fa fa-dashboard"></i>  @lang('site.ORDERS')</a></li>
                <li class="active">@lang('site.create')  @lang('site.ORDERS')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">


                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            @lang('site.all_categories')
                        </div>


                        <div class="box-body">

                            @if ( count($categories ))

                            @foreach ( $categories as $category )

                            <div class="panel panel-primary">
                            <div class="panel-heading">

                                <h4 class="panel-title"><a style="display: block ; font-size:17px" href="#{{ $category->id }}"  data-toggle="collapse">  {{ $category->name }} </a></h4>
                            </div>
                            </div>


                            <div class="panel-collapse collapse" id="{{ $category->id }}" >

                            @if (count($category->products))



                            <table class="table table-hover" >
                                <thead>
                                    <tr>
                                        <th> @lang('site.name')</th>
                                        <th> @lang('site.price')</th>
                                        <th> @lang('site.add')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $category->products as $product )
                                    <tr class="product-{{  $product->id}}">
                                        <td> {{ $product->name }}</td>
                                        <td> {{ $product->sale_price }}</td>
                                        <td>  <button
                                             data-id="{{  $product->id}}"
                                             data-name="{{  $product->name}}"
                                             data-price="{{  $product->sale_price}}"
                                             id="add-{{ $product->id}}"
                                             class="btn btn-success btn-sm add_to_order"> <i class="fas fa-plus"></i>
                                            </button></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>


                            @endif

                            </div>
                            @endforeach

                            @else
                                 <p> @lang('site.no_data_found')</p>
                            @endif

                        </div>
                    </div>
                </div>



{{--  //end products  --}}
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            @lang('site.orders')
                            @include('partials._errors')


                        </div>


                        <div class="box-body">




                            <form method="POST" action="{{ route('dashboard.orders.store' ,$customer->id) }}">
                                @csrf
                            <table class="table table-hover order_box" >
                                <thead>
                                    <tr>
                                        <th> @lang('site.name')</th>
                                        <th> @lang('site.quantity')</th>
                                        <th> @lang('site.price')</th>
                                        <th> @lang('site.delete')</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>

                        <div class="box-footer">
                            <strong><p style="margin-top:50px"> @lang('site.total') : <span class="total-amount"> 0 </span></p></strong>
                            <button type="submit" id="add-order-btn" class="btn btn-primary btn-block disabled">@lang('site.add')</button>
                        </div>

                            </form>
                        </div>
                    </div>
                </div>




            </div>

            {{--  //en row 1  --}}









        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


