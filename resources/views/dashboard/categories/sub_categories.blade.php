@extends('layouts.dashboard.dashboard-master')
@section('title' )
@lang('site.CATEGORIES')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>{{ $parent_category->name }} @lang('site.sub_categories')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li class="active"> @lang('site.CATEGORIES')</li>
            </ol>
        </section>

        <section class="content">


            <div class="box box-primary">
                @include('partials._errors')
                <div class="box-header with-border">
                    <form action="{{ route('dashboard.sub_categories',$parent_category->id ) }}">
                        <div class="row">
                            <div class="col-md-4">
                            <input  value="{{ request()->search }}" type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                            </div>
                            <div class="col-md-4">
                            <button class="btn btn-primary"><i class="fas fa-search"></i> @lang('site.search') </button>

                            @if (Auth::user()->isAbleTO('categories-create'))
                            <a href="{{ route('dashboard.categories.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> @lang('site.add')</a>
                            @else
                            <button class="btn btn-success disabled"> <i class="fas fa-plus"></i> @lang('site.add')</button>
                            @endif
                            </div>
                        </div>
                    </form>




                </div>

                <div class="box-body">



                    @if (count($categories))
                    <table class="table table-bordered" style="overflow: auto">

                        <thead>
                            <tr>
                                <th>@lang('site.id')</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.products_count')</th>
                                <th>@lang('site.related_products')</th>
                                <th>@lang('site.action')</th>

                            </tr>
                        </thead>

                        <tbody>


                            @foreach ($categories as $category)

                            <tr>
                                <td> {{$category->id }}</td>

                                <td> {{$category->name }}</td>
                                <td> {{$category-> products_count }}</td>
                                <td> <a class="btn btn-info" href="{{ route('dashboard.products.index',['category_id'=> $category->id]) }}">@lang('site.related_products')</a></td>

                                <td>

                                @if (Auth::user()->isAbleTO('categories-update'))
                                <a href="{{ route('dashboard.categories.edit',$category->id ) }}" class="btn btn-primary btn-sm"> <i class="far fa-edit"></i>  @lang('site.edit')</a>
                                @else

                                 <button class="btn btn-primary btn-sm disabled"> <i class="far fa-edit"></i>  @lang('site.edit')</button>

                                @endif

                                @if (Auth::user()->isAbleTO('categories-delete'))
                                <form  class="delete" style="display:inline-block" action="{{ route('dashboard.categories.destroy',$category->id ) }}" method="POST">
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

                        {!! $categories->appends(request()->query())->links('pagination::bootstrap-4')!!}


                    @else
                    <h2 style="padding: 20px"> @lang('site.no_data_found')</h2>
                    @endif

                    {{--  <textarea class="ckeditor" id="ckeditor"></textarea>  --}}


                </div>

            </div>




    </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


