$(document).ready(function() {

        calculateTotal()
            // add order


        $('.add_to_order').on('click', function(e) {
            if (!$(this).hasClass('disabled')) {
                let id = $(this).data('id'),
                    name = $(this).data('name'),
                    price = $(this).data('price');


                $(this).removeClass('btn-primary').addClass('disabled btn-default')
                    // <input type="hidden"  value="${id}" name="product_ids[]">

                $product = `<tr class="order_item">
                        <td> ${name}</td>
                        <td> <input name="products[${id}][quantity]" class="quantity form-control mx-sm-3" type='number' min="1" value ="1"></td>
                        <td class="item_price" data-price="${price}"> ${price}</td>
                        <td> <button class="btn btn-danger btn-sm delete_item" data-item="${id}"> <i class="fas fa-trash"></i></button></td>
                    </tr>`;

                $('.order_box').append($product);
                calculateTotal()
            }






        });

        //end of add


        $('body').on('change , keyup', '.quantity', function() {

            calculateTotal()

        })

        $('body').on('click', '.disabled', function(event) {
            event.preventDefault();
        })


        $('body').on('click , submit', '.delete_item', function(event) {
            event.preventDefault();
            let id = $(this).attr('data-item');
            $(this).parent('td').parent('tr').remove();
            $('#add-' + id).removeClass('disabled').addClass('btn-success');
            calculateTotal()
        })


    }) //end of onready


function calculateTotal() {
    let total = 0;
    $('.order_item').each(function() {
        let quantity = parseFloat($(this).find('.quantity').val());
        let price = parseFloat($(this).find('.item_price').data('price'));
        total += quantity * price;

        $(this).find('.item_price').html($.number(quantity * price, 2))
    })

    $('.total-amount').html($.number(total, 2))


    if (total > 0) {
        $('#add-order-btn').removeClass('disabled');
    } else {
        $('#add-order-btn').addClass('disabled');

    }


}


let showOrderForma = Array.from(document.querySelectorAll('.show-order-form'));

showOrderForma.forEach((form) => {
    form.addEventListener('submit', function(event) {

        event.preventDefault()

        fetch(event.target.action, {
                method: 'Get',
            })
            .then(res => res.json())
            .then((res) => {
                console.log(event.target.action)
                let orderbox = document.getElementById('show-order');

                orderbox.innerHTML = res.data;
            })
            .catch(error => {



                console.log(error);

            })



    });

});