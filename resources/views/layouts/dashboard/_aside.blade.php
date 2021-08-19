<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->image_path  }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li @if (Route::is('dashboard')) class="active" @endif ><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>@lang('site.DASHBOARD')</span></a></li>




{{--  CATEGORIES  --}}
<li
@if (Route::is('dashboard.categories.index')) class="active" @endif
 ><a href="{{ route('dashboard.categories.index') }}"> <i class="fas fa-braille"></i> <span>@lang('site.CATEGORIES')</span></a>
</li>
@if (Auth::user()->hasPermission('orders-read'))

@endif



{{--  PRODUCTS  --}}

@if (Auth::user()->hasPermission('products-read'))
<li
@if (Route::is('dashboard.products.index')) class="active" @endif
 ><a href="{{ route('dashboard.products.index') }}"> <i class="fas fa-cart-plus"></i> <span>@lang('site.PRODUCTS')</span></a>
</li>
@endif

{{--  CUSTOMERS  --}}

@if (Auth::user()->hasPermission('customers-read'))
<li
@if (Route::is('dashboard.customers.index')) class="active" @endif
 ><a href="{{ route('dashboard.customers.index') }}"> <i class="fas fa-users"></i><span>@lang('site.CUSTOMERS')</span></a>
</li>
@endif


{{--  ORDERS  --}}


@if (Auth::user()->hasPermission('orders-read'))
<li
@if (Route::is('dashboard.orders.index')) class="active" @endif
 ><a href="{{ route('dashboard.orders.index') }}"><i class="fas fa-sort-amount-up-alt"></i> <span>@lang('site.ORDERS')</span></a>
</li>
@endif

{{--  MODERATOR  --}}
@if (Auth::user()->hasPermission('users-read'))
<li
@if (Route::is('dashboard.users.*')) class="active" @endif ><a href="{{ route('dashboard.users.index') }}"><i class="fas fa-chalkboard-teacher"></i> <span>@lang('site.MODERATOR')</span></a>
</li>
@endif




        </ul>

    </section>

</aside>

