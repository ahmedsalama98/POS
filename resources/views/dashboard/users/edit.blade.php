@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.edit')  @lang('site.MODERATOR')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.edit')  @lang('site.MODERATOR')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}">  @lang('site.MODERATOR')</a></li>
                <li class="active">@lang('site.edit')  @lang('site.MODERATOR')</li>
            </ol>
        </section>

        <section class="content">


            <div class="box box-primary">

                <div class="box-header with-header" ></div>

            @include('partials._errors')
                <div class="box-body">

                    <form method="POST" action="{{ route('dashboard.users.update' , $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
{{--  first_name'  --}}
                        <div class="form-group">
                            <label for="first_name">@lang('site.first_name')</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name}}">
                        </div>
{{--  last_name'  --}}
                        <div class="form-group">
                            <label for="last_name">@lang('site.last_name')</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}">
                        </div>
{{-- email  --}}
                        <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>
{{-- image  --}}
                         <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                            <input type="file" name="image" id="email" class="file image" >
                        </div>
                        <div class="form-group">
                            <img class="image-preview" style="width: 80px" class="img-thumbnail" src="{{$user->image_path}}" alt="">
                        </div>
{{--  password'  --}}
                        <div class="form-group">
                            <label for="password">@lang('site.password')</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="@lang('site.let_pass_empty')" >
                        </div>
{{--  password_confirmation'  --}}
                        <div class="form-group">
                            <label for="password_confirmation">@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="@lang('site.let_pass_empty')" >
                        </div>


{{--  permissions'  --}}
@php
$models =['users' , 'products', 'categories' , 'orders','customers',];
@endphp
                    <div class="form-group">
                        <label for="permissions">@lang('site.permissions')</label>

                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom" style="padding: 10px">
                            <ul class="nav nav-tabs">
                                @foreach ($models as $idex => $model)
                                <li class={{$idex ==0 ?'active' :''}}><a href="#{{$model }}" data-toggle="tab"> @lang('site.'.$model) </a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content" style="padding: 10px">

                                @foreach ($models as $idex => $model)

                                <div class="tab-pane {{$idex ==0 ?'active' :''}}" id="{{$model }}">

                                    <div class="form-group">

                                        <input @if ($user->hasPermission("{$model}-read")) checked @endif type="checkbox" value="{{$model }}-read" class="minimal" name="permissions[]"  class="form-control" >
                                        <label >  @lang('site.read') @lang('site.'.$model )</label>
                                    </div>


                                    <div class="form-group">

                                        <input @if ($user->hasPermission("{$model}-create")) checked @endif  type="checkbox"value="{{$model }}-create" class="minimal" name="permissions[]"  class="form-control" >
                                        <label >  @lang('site.create') @lang('site.'.$model )</label>

                                    </div>



                                    <div class="form-group">

                                        <input @if ($user->hasPermission("{$model}-update")) checked @endif type="checkbox" value="{{$model }}-update" class="minimal" name="permissions[]"  class="form-control" >
                                        <label >  @lang('site.update') @lang('site.'.$model )</label>

                                    </div>


                                    <div class="form-group">

                                        <input @if ($user->hasPermission("{$model}-delete")) checked @endif type="checkbox" value="{{$model }}-delete" class="minimal" name="permissions[]"  class="form-control" >
                                        <label >  @lang('site.delete') @lang('site.'.$model )</label>

                                    </div>


                                </div>
                                @endforeach

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->




                    </div>
{{-- submit'  --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.update')</button>
                        </div>

                    </form>

                </div>
            </div>
        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


