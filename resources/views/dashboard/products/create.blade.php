@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.create')  @lang('site.PRODUCTS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.create')  @lang('site.PRODUCTS')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> <i class="fa fa-dashboard"></i>  @lang('site.PRODUCTS')</a></li>
                <li class="active">@lang('site.create')  @lang('site.PRODUCTS')</li>
            </ol>
        </section>



        <section class="content">


            <div class="box box-primary">

                <div class="box-header with-header" ></div>

            @include('partials._errors')
                <div class="box-body">

                    <form method="POST" action="{{ route('dashboard.products.store') }}" enctype="multipart/form-data">
                    @csrf
{{-- name  --}}

                        @foreach ( ['ar', 'en'] as $locale)
                        <div class="form-group">
                            <label for="{{ $locale }}_name">@lang('site.'. $locale .'.name')</label>
                            <input type="text" name=" {{ $locale }}[name]" id="{{ $locale }}_name" class="form-control" value="{{ old($locale.'.name') }}">
                        </div>


{{--  description'  --}}


                        <div class="form-group">
                            <label for="{{ $locale }}_description">@lang('site.'. $locale .'.description')</label>

                            <textarea name=" {{ $locale }}[description]"  class="form-control ckeditor">{{ old($locale.'.description') }}</textarea>
                        </div>
                        {{--  <script>
                            CKEDITOR.replace( 'editor1' );
                        </script>  --}}
                        @endforeach

{{--  category'  --}}


                        <div class="form-group">
                            <label >@lang('site.all_categories')</label>

                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option value="">...</option>
                                @foreach ( $categories as $category)
                                <option {{ old('category_id')== $category->id  ? 'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
{{--  image  --}}


                        <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                            <input type="file" name="image" id="image" class="form-control " >

                            <img class="image-preview img-thumbnail" style="width: 200px" src="{{ asset('uploads/products_images/default.png') }}" alt="">

                        </div>


{{--  parchese_price'  --}}


                        <div class="form-group">
                            <label for="purchese_price">@lang('site.purchase_price')</label>
                            <input type="number" name="purchese_price" id="purchese_price" class="form-control" value="{{ old('purchese_price')}}">
                        </div>
{{--  sale_price'  --}}


                        <div class="form-group">
                            <label for="sale_price">@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ old('sale_price')}}">
                        </div>

{{--  stock'  --}}


                        <div class="form-group">
                            <label for="stock">@lang('site.stock')</label>
                            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock')}}">
                        </div>




{{-- submit'  --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                        </div>

                    </form>

                </div>
            </div>
        </section><!-- end of content -->


    </div><!-- end of content wrapper -->


@endsection


