@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.edit')  @lang('site.CATEGORIES')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.edit')  @lang('site.CATEGORIES')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li><a href="{{ route('dashboard.categories.index') }}"> <i class="fa fa-dashboard"></i>  @lang('site.CATEGORIES')</a></li>
                <li class="active">@lang('site.edit')  @lang('site.CATEGORIES')</li>
            </ol>
        </section>

        <section class="content">


            <div class="box box-primary">

                <div class="box-header with-header" ></div>

            @include('partials._errors')
                <div class="box-body">

                    <form method="POST" action="{{ route('dashboard.categories.update' , $category->id) }}" >
                    @csrf
                    @method('PUT')
{{-- ar.name  --}}
                        <div class="form-group">
                            <label for="ar_name">@lang('site.ar.name')</label>
                            <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ $category->ar_name }}">
                        </div>
{{--  en.name'  --}}
                        <div class="form-group">
                            <label for="en_name">@lang('site.en.name')</label>
                            <input type="text" name="en_name" id="en_name" class="form-control" value="{{ $category->en_name}}">

                        </div>
{{--  parent id --}}
                        <div class="form-group">
                            <label for="parent_id">@lang('site.parent_category')</label>
                            <select  name="parent_id" id="parent_id" class="form-control" value="{{ old('parent_id') }}">
                                <option value=""> @lang('site.main_category')</option>
                                @foreach ($categories as $parent_category )
                                <option {{$category->parent_id== $parent_category->id  ?'selected':''}} value="{{ $parent_category->id }}"> {{ $parent_category->name }}</option>
                                @endforeach
                            </select>

                        </div>

{{-- submit'  --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form>

                </div>
            </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


