$(document).ready(function(){

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })


    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000 : {
                items: 5
            }
        }
    });

    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })


    // product qty section
    let $qty_up = $(".qty-up");
    let $qty_down = $(".qty .qty-down");
    // let $input = $(".qty .qty_input");

    // click on qty up button
    $qty_up.click(function(){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $itemPrice = $(`.itemPrice[data-id='${$(this).data("id")}']`);
        let total = parseInt($("#totalPrice").text()); // Total Price



        $.ajax({

            url     : "Partials/ajax.php",
            method  : "POST",
            data    : { id : $(this).data('id')},
            success : function (response) {

                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });
                    $itemPrice.text(parseInt(response * $input.val())); // Item Price
                    // The price was subtracted because it was added the first time I pressed the “Add to Cart” button
                    $("#totalPrice").text((total + parseInt(response * $input.val())) - response );
                }

            }

        });


    });

    // click on qty down button
    $qty_down.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $itemPrice = $(`.itemPrice[data-id='${$(this).data("id")}']`);
        let total = parseInt($("#totalPrice").text()); // Total Price


        $.ajax({

            url     : "Partials/ajax.php",
            method  : "POST",
            data    : { id : $(this).data('id')},
            success : function (response) {

                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });
                    $itemPrice.text(parseInt(response * $input.val())); // Item Price
                    $("#totalPrice").text((total - parseInt(response * $input.val()))); // Total Price
                }

            }

        });




    });



});

