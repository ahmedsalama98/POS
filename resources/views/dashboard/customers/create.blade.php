@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.create')  @lang('site.CUSTOMERS')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.create')  @lang('site.CUSTOMERS')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li><a href="{{ route('dashboard.customers.index') }}"> <i class="fa fa-dashboard"></i>  @lang('site.CUSTOMERS')</a></li>
                <li class="active">@lang('site.create')  @lang('site.CUSTOMERS')</li>
            </ol>
        </section>


        <section class="content">


            <div class="box box-primary">

                <div class="box-header with-header" ></div>

            @include('partials._errors')
                <div class="box-body">

                    <form method="POST" action="{{ route('dashboard.customers.store') }}" >
                    @csrf
{{-- name  --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>


                        @for ($i = 0; $i < 2 ; $i++)
 {{--  phone  --}}
                        <div class="form-group">
                            <label for="phone">@lang('site.phone') {{ $i+1 }}</label>
                            <input type="tel" name="phone[]" id="phone" class="form-control" value="{{ old('phone.'.$i) }}">

                        </div>



                        @endfor
{{--  address'  --}}
                        <div class="form-group">
                            <label for="address">@lang('site.address')</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">

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


