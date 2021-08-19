@extends('layouts.dashboard.dashboard-master')
@section('title' )
@lang('site.MODERATOR')
@endsection
@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.MODERATOR')  <small>({{ $users->count() }})</small></h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-dashboard"></i>  @lang('site.DASHBOARD')</a></li>
                <li class="active"> @lang('site.MODERATOR')</li>
            </ol>
        </section>

        <section class="content">


                <div class="box box-primary">
                    @include('partials._errors')
                    <div class="box-header with-border">
                        <form action="{{ route('dashboard.users.index') }}">
                            <div class="row">
                                <div class="col-md-4">
                                <input  value="{{ request()->search }}" type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                                </div>
                                <div class="col-md-4">
                                <button class="btn btn-primary"><i class="fas fa-search"></i> @lang('site.search') </button>

                                @if (Auth::user()->isAbleTO('users-create'))
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> @lang('site.add')</a>
                                @else
                                <button class="btn btn-success disabled"> <i class="fas fa-plus"></i> @lang('site.add')</button>
                                @endif
                                </div>
                            </div>
                        </form>




                    </div>

                    <div class="box-bod">



                        @if (count($users))
                        <table class="table table-bordered" style="overflow: auto">

                            <thead>
                                <tr>
                                    <th>@lang('site.id')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.first_name')</th>
                                    <th>@lang('site.last_name')</th>
                                    <th>@lang('site.email')</th>
                                    <th>@lang('site.action')</th>

                                </tr>
                            </thead>

                            <tbody>


                                @foreach ($users as $user)

                                <tr>
                                    <td> {{$user->id }}</td>
                                    <td>
                                        <img style="width: 80px" class="img-thumbnail" src="{{$user->image_path }}" alt="">
                                    </td>
                                    <td> {{$user->first_name }}</td>
                                    <td> {{$user->last_name }}</td>
                                    <td> {{$user->email }}</td>
                                    <td>
                                    @if (Auth::user()->isAbleTO('users-update'))
                                    <a href="{{ route('dashboard.users.edit',$user->id ) }}" class="btn btn-primary btn-sm"> <i class="far fa-edit"></i>  @lang('site.edit')</a>
                                    @else

                                     <button class="btn btn-primary btn-sm disabled"> <i class="far fa-edit"></i>  @lang('site.edit')</button>

                                    @endif

                                    @if (Auth::user()->isAbleTO('users-delete'))
                                    <form class="delete" style="display:inline-block" action="{{ route('dashboard.users.destroy',$user->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i> @lang('site.delete')</button>
                                    </form>

                                    @else

                                    <button class="btn btn-danger btn-sm disabled"> <i class="far fa-trash-alt"></i> @lang('site.delete')</button>

                                    @endif


                                    </td>


                                </tr>

                                @endforeach


                            </tbody>

                            </table>

                            {!! $users->appends(request()->query())->links('pagination::bootstrap-4')!!}
                        @else
                        <h2 style="padding: 20px"> @lang('site.no_data_found')</h2>
                        @endif
                    </div>

                </div>




        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection


