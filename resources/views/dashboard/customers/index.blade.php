@extends('layouts.dashboard.dashboard-master')
@section('title' )
@lang('site.CUSTOMERS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content">


            <div class="box box-primary">
                @include('partials._errors')
                <div class="box-header with-border">
                    <form action="{{ route('dashboard.customers.index') }}">
                        <div class="row">
                            <div class="col-md-4">
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



                    @if (count($customers))
                    <table class="table table-bordered" style="overflow: auto">

                        <thead>
                            <tr>
                                <th>@lang('site.id')</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.action')</th>

                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($customers as $customer)

                            <tr>
                                <td> {{$customer->id }}</td>

                                <td> {{$customer->name }}</td>
                                <td> {{implode('-' ,$customer->phone )}}</td>
                                <td> {{$customer->address }}</td>

                                <td>
                                    @if (Auth::user()->isAbleTO('orders-create'))
                                    <a href="{{ route('dashboard.orders.create',$customer->id ) }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  @lang('site.add_order')</a>
                                    @else

                                     <button class="btn btn-primary btn-sm disabled"> <i class="far fa-edit"></i>  @lang('site.add_order')</button>

                                    @endif

                                @if (Auth::user()->isAbleTO('customers-update'))
                                <a href="{{ route('dashboard.customers.edit',$customer->id ) }}" class="btn btn-primary btn-sm"> <i class="far fa-edit"></i>  @lang('site.edit')</a>
                                @else

                                 <button class="btn btn-primary btn-sm disabled"> <i class="far fa-edit"></i>  @lang('site.edit')</button>

                                @endif

                                @if (Auth::user()->isAbleTO('customers-delete'))
                                <form  class="delete" style="display:inline-block" action="{{ route('dashboard.customers.destroy',$customer->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm "> <i class="far fa-trash-alt"></i> @lang('site.delete')</button>
                                </form>

                                @else

                                <button class="btn btn-danger btn-sm disabled"> <i class="far fa-trash-alt"></i> @lang('site.delete')</button>

                                @endif




                                </td>


                            </tr>

                            @endforeach


                        </tbody>

                        </table>

                        {!! $customers->appends(request()->query())->links('pagination::bootstrap-4')!!}


                    @else
                    <h2 style="padding: 20px"> @lang('site.no_data_found')</h2>
                    @endif

                    {{--  <textarea class="ckeditor" id="ckeditor"></textarea>  --}}


                </div>

            </div>




    </section><!-- end of content -->

    </div><!-- end of content wrapper -->


    </div><!-- end of content wrapper -->


@endsection


