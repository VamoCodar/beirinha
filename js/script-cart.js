
jQuery(document).ready(function($){   


 // add to cart on product slider
  $('body').on( 'click', '.mais, .menos', function() {

      // Get current quantity values
      var inputQty = $(this).closest("div.beirinha-cart-add").find('.qty')

      var badge = $(this).closest("div.beirinha-cart-add").find('.badge')
      badge.removeClass('ativo')

      var qty = inputQty.val()      
      var val = parseFloat(qty);
      var max = parseFloat(inputQty.attr( 'max' ))
      var min = parseFloat(inputQty.attr( 'min' ))
      var step = parseFloat(inputQty.attr( 'step' ))

      // Change the value if plus or minus
      if ( $( this ).is( '.mais' ) ) {

          if ( max && ( max <= val ) ) {
            inputQty.val( max );
          }

          else {
            var total = val + step
            inputQty.val( total )
            badge.addClass('ativo')
            badge.html(total)            
          }
      }

      else {

          if ( min && ( min >= val ) ) {
            inputQty.val( min );

            badge.removeClass('ativo')
            badge.html('')
          }
           
          else if ( val > 1 ) {

            var total = val - step
            inputQty.val( val - step );

            badge.addClass('ativo')
            badge.html(total)
          }
      }
       
  });


  // add to cart on single product page

  $('body').on( 'click', '.single-mais, .single-menos', function() {

    // Get current quantity values
    var inputQty = $(this).closest("div.beirinha-cart-add").find('.qty')

    var badge = $(this).closest("div.beirinha-cart-add").find('.labelqty')    

    var qty = inputQty.val()      
    var val = parseFloat(qty);
    var max = parseFloat(inputQty.attr( 'max' ))
    var min = parseFloat(inputQty.attr( 'min' ))
    var step = parseFloat(inputQty.attr( 'step' ))

    // Change the value if plus or minus
    if ( $( this ).is( '.single-mais' ) ) {

        if ( max && ( max <= val ) ) {
          inputQty.val( max );
        }

        else {
          var total = val + step
          inputQty.val( total )
          badge.html(total)            
        }
    }

    else {

        if ( min && ( min >= val ) ) {
          inputQty.val( min );
          badge.html('')
        }
         
        else if ( val > 1 ) {

          var total = val - step
          inputQty.val( val - step );
          badge.html(total)
        }
    }
     
});


  function updateCartQty(){

    $.ajax({
      type: "post",
      dataType: "json",
      url: ajaxurl, 
      data: {
          action:'get_data'
      },
      success: function(cartTotal){
        var cartTotal = parseInt(cartTotal)

        if(cartTotal == 10){
          cartTotal = 1
        }else{
          cartTotal = cartTotal /10
        }
        console.log(cartTotal)

        $('#badgeHeader').addClass('ativo')
        $('#badgeHeader').html(cartTotal)

      }
  });
  
  }

  $('.add-cart').on('click', function(e){ 


    e.preventDefault();

    $thisbutton = $(this),

                $form = $thisbutton.closest('div.beirinha-cart-add'),

                id = $thisbutton.val(),

                product_qty = $form.find('input[name=qty]').val() || 1,

                product_id = $form.find('input[name=product_id]').val() || id,

                variation_id = $form.find('input[name=variation_id]').val() || 0;

    var data = {

            action: 'ql_woocommerce_ajax_add_to_cart',

            product_id: product_id,

            product_sku: '',

            quantity: product_qty,

            variation_id: variation_id,

        };

    $.ajax({

            type: 'post',

            url: ajaxurl,

            data: data,

            beforeSend: function (response) {

                $thisbutton.removeClass('added').addClass('loading');
                
                var addmessage = $thisbutton.closest('.add-cart a')

                addmessage.prop('style', 'color:forestgreen !important;')

                addmessage.html('Adicionado').delay(1000);

                var produtos = 'Produto adicionado!';

                if(product_qty > 1){
                  produtos = 'Produtos adicionados!' 
                }

                $('#cart-message').html(product_qty + ' ' + produtos)

                document.getElementById('cart-tooltip').style.opacity = '1'                

            },

            complete: function (response) {

               $thisbutton.addClass('added').removeClass('loading');
                
                updateCartQty()

                var addmessage = $thisbutton.closest('.add-cart a')
                
                document.getElementById('cart-tooltip').style.opacity = '0'

            }, 

            success: function (response) { 

                if (response.error & response.product_url) {

                    window.location = response.product_url;

                    return;

                } else { 
                  
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);

                } 

            }, 

        }); 

     }); 

   
});