
<table class="table table-hover order_box" >
     <thead>
         <tr>
             <th> @lang('site.name')</th>
             <th> @lang('site.quantity')</th>
             <th> @lang('site.price')</th>
         </tr>
     </thead>
     <tbody>


        @foreach ($order->products as $product )
        <tr class="order_item">
            <td>{{ $product-> name }}</td>
            <td> {{  $product->pivot->quantity }}</td>
            <td class="item_price" data-price="{{ $product-> sale_price }}"> {{ $product-> sale_price * $product->pivot->quantity }}</td>
        </tr>
        @endforeach

     </tbody>

 </table>

<div class="box-footer">
 <strong><p style="margin-top:50px"> @lang('site.total') : <span class="total-amount"> {{ $order->total_price }} </span></p></strong>

 @if (Auth::user()->hasPermission('orders-update'))
 <a href="{{ route('dashboard.orders.edit',$order->id ) }}" class="btn btn-primary btn-block"> <i class="fas fa-edit"></i> @lang('site.edit')</a>
@else
 <button  class="btn btn-primary disabled"> <i class="fas fa-edit"></i> @lang('site.edit')</button>
 @endif
</div>


