$( document ).ready(function() {

    /* work with cart */
    $('.add-to-cart').on('click', function(eventObject){
        var id = $(this).attr('data_id');
        var name = $(this).attr('data_name');
        var price = $(this).attr('data_price');

        $(this).parents('.product-item').find('.success-message').text('Товар добавлен').show();

        setTimeout(function(){
            $('.success-message').hide();
            }, 800);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST', // Type of response and matches what we said in the route
            url: 'addCart', // This is the url we gave in the route
            data: { 'name' : name,
                    'price' : price,
                    'id' : id
            }, // a JSON object to send back
            success: function(response){ // What to do if we succeed
                console.log(response);
                count = response['count'];
                $('#count').text(count);
            },
            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

    $('.list-cart').mouseover(function () {
        ShowBasket();
    });

    $('.list-cart').mouseout(function () {
        HideBasket();
    });

    function ShowBasket(){
        $('.order').addClass('show').removeClass('hidden');
    }

    function HideBasket(){
        $('.order').addClass('hidden').removeClass('show');
    }


    /*Function to show and hide categories list*/
    $('.catalog').mouseover(function () {
        showCategoryList();
    });

    $('.catalog').mouseout(function () {
        hideCategoryList();
    });

    function showCategoryList()
    {
        $('.drop-list').show();
    }

    function hideCategoryList()
    {
        $('.drop-list').hide();
    }
});