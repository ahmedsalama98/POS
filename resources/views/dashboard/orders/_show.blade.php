
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
            <td class="item_price" data-price="{{ $product-> sale_price }}"> {{ number_format($product-> sale_price * $product->pivot->quantity,2) }}</td>
        </tr>
        @endforeach

     </tbody>
     <tfoot>
          <tr>
              <td>
                <strong><p style="margin-top:50px"> @lang('site.total') : <span class="total-amount"> {{number_format($order->total_price ,2) }} </span></p></strong>
              </td>
          </tr>
     </tfoot>
 </table>

<div class="box-footer">
    <div class="lds-roller" ><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>

 <button id="print" class="btn btn-primary btn-block"> <i class="fas fa-print"></i> @lang('site.print')</button>

</div>


