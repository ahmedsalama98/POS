@extends('layouts.dashboard.dashboard-master')
@section('title' )
@lang('site.PRODUCTS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.PRODUCTS') {{ count($products) }}</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li class="active"> @lang('site.PRODUCTS')</li>
            </ol>
        </section>

        <section class="content">


            <div class="box box-primary">
                @include('partials._errors')
                <div class="box-header with-border">
                    <form action="{{ route('dashboard.products.index') }}">
                        <div class="row">
                            <div class="col-md-4">
                            <input  value="{{ request()->search }}" type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                            </div>

                            <div class="col-md-4">

                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option value="">@lang('site.all_categories')</option>
                                    @foreach ( $categories as $category)
                                    <option {{ request()->category_id== $category->id  ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                            <button class="btn btn-primary"><i class="fas fa-search"></i> @lang('site.search') </button>

                            @if (Auth::user()->isAbleTO('products-create'))
                            <a href="{{ route('dashboard.products.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> @lang('site.add')</a>
                            @else
                            <button class="btn btn-success disabled"> <i class="fas fa-plus"></i> @lang('site.add')</button>
                            @endif
                            </div>
                        </div>
                    </form>




                </div>

                <div class="box-bod">



                    @if (count($products))
                    <table class="table table-bordered" style="overflow: auto">

                        <thead>
                            <tr>
                                <th>@lang('site.id')</th>
                                <th> @lang('site.image')</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.purchase_price')</th>
                                <th>@lang('site.sale_price')</th>
                                <th>@lang('site.profit_percent') %</th>
                                <th>@lang('site.stock')</th>
                                <th>@lang('site.category')</th>
                                <th>@lang('site.action')</th>

                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($products as $product)

                            <tr>
                                <td> {{$product->id }}</td>
                                <th> <img class=" img-thumbnail" style="width: 100px" src="{{ $product->image_path}}" alt=""></th>
                                <td> {{$product->name }}</td>

                                <td> {!! $product->description !!} </td>
                                <td> {!!$product->purchese_price  !!} </td>
                                <td> {{$product->sale_price }}</td>
                                <td> {{$product->profit_percent }}%</td>
                                <td> {{$product->stock }}</td>
                                <td> {{$product->category_name }}</td>


                                <td>
                                @if (Auth::user()->isAbleTO('products-update'))
                                <a href="{{ route('dashboard.products.edit',$product->id ) }}" class="btn btn-primary btn-sm"> <i class="far fa-edit"></i>  @lang('site.edit')</a>
                                @else

                                 <button class="btn btn-primary btn-sm disabled"> <i class="far fa-edit"></i>  @lang('site.edit')</button>

                                @endif

                                @if (Auth::user()->isAbleTO('products-delete'))
                                <form  class="delete" style="display:inline-block" action="{{ route('dashboard.products.destroy',$product->id ) }}" method="POST">
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

                        {!! $products->appends(request()->query())->links('pagination::bootstrap-4')!!}


                    @else
                    <h2 style="padding: 20px"> @lang('site.no_data_found')</h2>
                    @endif

                    {{--  <textarea class="ckeditor" id="ckeditor"></textarea>  --}}


                </div>

            </div>




    </section><!-- end of content -->


    </div><!-- end of content wrapper -->


@endsection


