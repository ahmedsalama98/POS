@extends('layouts.dashboard.dashboard-master')
@section('title' )
@lang('site.ORDERS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.ORDERS')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li class="active"> @lang('site.ORDERS')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <form action="{{ route('dashboard.orders.index') }}">
                                <div class="row">
                                    <div class="col-md-8">
                                    <input  value="{{ request()->search }}" type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                                    </div>
                                    <div class="col-md-4">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i> @lang('site.search') </button>

                                    @if (Auth::user()->isAbleTO('customers-create'))
                                    <a href="{{ route('dashboard.customers.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> @lang('site.add')</a>
                                    @else
                                    <button class="btn btn-success disabled"> <i class="fas fa-plus"></i> @lang('site.add')</button>
                                    @endif
                                    </div>
                                </div>
                            </form>

                        </div>


                        <div class="box-body">

                            <table class="table table-hover order_box" >
                                <thead>
                                    <tr>
                                        <th> @lang('site.customer_name')  </th>
                                        <th> @lang('site.items')  </th>
                                        <th> @lang('site.order_total_price')</th>
                                        <th> @lang('site.date')</th>
                                        <th> @lang('site.action')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  @if (count( $orders))
                                  @foreach ( $orders as $order)
                                  <tr>

                                      <td>  {{ $order->customer->name }}</td>
                                      <td>
                                              {{ $order->items_names }} 
                                      </td>
                                      <td>  {{ $order->total_price }}</td>
                                      <td>  {{ $order->created_at->format('Y-m-d') }}</td>

                                      <td>



                                      <form class="show-order-form" style="display: inline-block" action="{{ route('dashboard.orders.show',$order->id ) }}">
                                       @csrf
                                       <button type="submit" class="btn btn-success"> </i> @lang('site.show')</button>
                                      </form>



                                      @if (Auth::user()->hasPermission('orders-update'))
                                          <a href="{{ route('dashboard.orders.edit',$order->id ) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> @lang('site.edit')</a>
                                      @else
                                      <button  class="btn btn-primary disabled"> <i class="fas fa-edit"></i> @lang('site.edit')</button>
                                      @endif

                                      @if (Auth::user()->hasPermission('orders-delete'))
                                      <form   class="delete" style="display: inline-block" method="POST" action="{{ route('dashboard.orders.destroy',$order->id ) }}">
                                          @csrf
                                          @method('DELETE')
                                          <button type="subnit" class="btn btn-danger"> <i class="fas fa-edit"></i> @lang('site.delete')</button>

                                      </form>
                                      @else
                                      <button  class="btn btn-danger disabled"> <i class="fas fa-trsh"></i> @lang('site.delete')</button>
                                      @endif

                                  </td>
                                  </tr>

                                  @endforeach

                                  @else

                                  @endif

                                </tbody>


                            </table>

                            {!! $orders->appends(request()->query())->links('pagination::bootstrap-4')!!}


                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        </div>

                        <div class="box-body" id="show-order">

                            <table class="table table-hover order_box" >
                                <thead>
                                    <tr>
                                        <th> @lang('site.name')</th>
                                        <th> @lang('site.quantity')</th>
                                        <th> @lang('site.price')</th>
                                    </tr>
                                </thead>

                            </table>

                           <div class="box-footer">
                            <strong><p style="margin-top:50px"> @lang('site.total') : <span class="total-amount"> 0 </span></p></strong>


                            <button  class="btn btn-primary btn-block disabled"> <i class="fas fa-edit"></i> @lang('site.edit')</button>
                           </div>


                        </div>






                    </div>
                </div>

            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


