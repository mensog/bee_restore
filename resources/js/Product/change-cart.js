import {clean} from "../app";

jQuery($ => {
    const $body = $('body')

    $body.on('click', '.change-cart', function (e) {
        e.preventDefault()
        const productId = $(this).data('id');
        const quantity = $(this).data('quantity');
        const action = $(this).data('action');
        const fromPage = $(this).data('page');

        changeCart(productId, action, fromPage, quantity)
    })

    $body.on('click', '.cart-plus, .cart-minus',
        _.debounce(
            function () {
                let quantity = $(this).data('quantity');
                const type = $(this).data('type')
                if (type === 'minus') {
                    if (quantity > 0) {
                        quantity--
                    }
                }
                if (type === 'plus') {
                    if (quantity >= 0) {
                        quantity++
                    }
                }
                if (Number(quantity)) {
                    const productId = $(this).data('id');
                    const action = $(this).data('action');
                    const fromPage = $(this).data('page');
                    $(this).parent().find('.cart-qty').val(quantity)

                    changeCart(productId, action, fromPage, quantity)
                } else {
                    return null
                }
            }, 250))

    $body.on('blur', '.cart-qty',
        _.debounce(
            function () {
                let quantity = $(this).data('quantity');
                if (Number($(this).val()) !== Number(quantity)) {
                    const productId = $(this).data('id');
                    const action = $(this).data('action');
                    const fromPage = $(this).data('page');
                    quantity = $(this).val()

                    changeCart(productId, action, fromPage, quantity)
                } else {
                    return null
                }
            }, 250))

    function changeCart(productId, action, fromPage, quantity) {
        let data = {
            productId, action, fromPage, quantity
        }
        data = clean(data)
        const cart = $('#cart')
        const counter = $('#cartCounter')
        const cartTotal = $('#cartTotal')
        $.ajax({
            type: 'POST',
            url: "/api/cart",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify(data),
            contentType: 'application/json',
            beforeSend: () => {
                cart.addClass('loading')
            },
            success: data => {
                if (data['count'] === 0) {
                    counter.removeClass('d-xl-block')
                } else {
                    counter.addClass('d-xl-block')
                }
                counter.html(data['count'])
                cartTotal.html(data['cartTotal'])
                cart.replaceWith(data['html'])
                cart.removeClass('loading')
            },
            error: e => {
                console.log(e)
            }
        });
    }
})
