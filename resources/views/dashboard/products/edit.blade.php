@extends('layouts.dashboard.dashboard-master')
@section('title')
@lang('site.edit')  @lang('site.PRODUCTS')
@endsection
@section('content')

    <div class="content-wrapper">


        <section class="content">


            <div class="box box-primary">

                <div class="box-header with-header" ></div>
            @include('partials._errors')
                <div class="box-body">

                    <form method="POST" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
{{-- name  --}}

                    @foreach ( ['ar', 'en'] as $locale)

                    @php
                        $name = $locale . '_name';
                        $description = $locale . '_description';
                    @endphp
                    <div class="form-group">
                        <label for="{{ $locale }}_name">@lang('site.'. $locale .'.name')</label>
                        <input type="text" name=" {{ $locale }}[name]" id="{{ $locale }}_name" class="form-control" value="{{ $product->$name}}">
                    </div>


                    {{--  description'  --}}


                    <div class="form-group">
                        <label for="{{ $locale }}_description">@lang('site.'. $locale .'.description')</label>

                        <textarea name=" {{ $locale }}[description]"  class="form-control ckeditor">{{ $product->$description }}</textarea>
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
                            @foreach ( $categories as $parent_category)

                                <optgroup label="{{ $parent_category->name }}">
                                    @forelse ($parent_category->sub_categories as $sub_category )
                                    <option {{ old('category_id')== $sub_category->id  ? 'selected':''}} value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                    @empty
                                    @endforelse
                                </optgroup>
                            @endforeach
                        </select>

                    </div>
{{--  image  --}}


                        <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                            <input type="file" name="image" id="image" class="form-control image " >

                            <img class="image-preview img-thumbnail" style="width: 200px" src="{{ $product->image_path}}" alt="">

                        </div>


{{--  parchese_price'  --}}


                        <div class="form-group">
                            <label for="purchese_price">@lang('site.purchase_price')</label>
                            <input type="number" name="purchese_price" id="purchese_price" class="form-control" value="{{ $product->purchese_price}}">
                        </div>
{{--  sale_price'  --}}


                        <div class="form-group">
                            <label for="sale_price">@lang('site.sale_price')</label>
                            <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $product->sale_price}}">
                        </div>

{{--  stock'  --}}


                        <div class="form-group">
                            <label for="stock">@lang('site.stock')</label>
                            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock}}">
                        </div>




{{-- submit'  --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                        </div>

                    </form>

                </div>
            </div>
</section><!-- end of content -->

@endsection


