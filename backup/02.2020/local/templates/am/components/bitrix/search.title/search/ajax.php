<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
	<table class="title-search-result">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<!-- <tr>
				<th class="title-search-separator">&nbsp;</th>
				<td class="title-search-separator">&nbsp;</td>
			</tr> -->
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
				<? //	print_r($arItem); 
				?>
			<tr>
				<!-- <?if($i == 0):?>
					<th>&nbsp;<?echo $arCategory["TITLE"]?></th>
				<?else:?>
					<th>&nbsp;</th>
				<?endif?>

				<?if($category_id === "all"):?>
					<td class="title-search-all"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></a></td>
				<?elseif(isset($arItem["ICON"])):?>
					<td class="title-search-item"><a href="<?echo $arItem["URL"]?>"><img src="<?echo $arItem["ICON"]?>"><?echo $arItem["NAME"]?></a></td>
				<?else:?>s
					<td class="title-search-more"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></a></td>
				<?endif;?> -->
				
				<?if(isset($arItem["ICON"])):?>
					<td class="title-search-item">
					<div class="js-product-modal">

						<a rel="<?=$arItem["ITEM_ID"]?>" href="#" class="product__name show_tovar">
							<img src="<?echo $arItem["ICON"]?>"><?echo $arItem["NAME"]?>
						</a>
					</div>
					</td>
				<?endif;?>
				<?if($category_id === "all"):?>
					<td>
						<a href="<?=$arItem['URL']?>" class="btn btn_main"><?echo $arItem["NAME"]?></a>
					</td>
				<?endif;?>
			</tr>
			<?endforeach;?>
		<?endforeach;?>
		<!-- <tr>
			<th class="title-search-separator">&nbsp;</th>
			<td class="title-search-separator">&nbsp;</td>
		</tr> -->
	</table>

	<div class="title-search-fader"></div>
<?endif;
?>






<script>
	// !! переделать по человечески
$(".js-product-modal a.show_tovar").on('click', function(){
        var btn = $(this);                        
        $(".overlay").fadeIn(100, function(){}); 
        var id=$(this).attr('rel');
        $.ajax({
                    type: 'POST',
                    url: '/include/DetailElement.php?id='+id,
                    data: 'id='+id,

                    success: function(data){                         
                        $('.product-detail').empty();
                        $('.product-detail').append(data);
                        $('.product-detail').show(); 
                        $( " .product-detail a.quantity-counter__minus" ).unbind( "click" );
                        $( ".product-detail a.quantity-counter__minus" ).bind( "click", function(){Quantity($(this).attr('rel')+"s",1 , 'down', 1) });   
                        $( " .product-detail a.quantity-counter__plus" ).unbind( "click" );
                        $( ".product-detail a.quantity-counter__plus" ).bind( "click", function(){Quantity($(this).attr('rel')+"s",1 , 'up', 1) });   
                        $(".btn_add-to-cart, .product-detail .btn_add-to-cart").unbind( "click" );

    $( ".btn_add-to-cart, .product-detail .btn_add-to-cart" ).bind( "click", function(){
        var id=$(this).attr('id');
        var count=1;
        var cart_id=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").attr('ids'));
        var input=parseInt($("input[name=QUANTITY_PRODUCT_"+id+"]").val());

        if (input>0) {
            count=input;
        }

        if (cart_id>0) {
          $.ajax({
            type: 'POST',
            url: '/updateCart.php?id='+cart_id+'&qty='+count,
            data: '',
            success: function(data){                         
              $('.basket__inner').empty();
              $('.basket__inner').append(data);
              $('#basket-added-window').show();
              //$('#overlay').show();
              $(".overlay").fadeIn(100, function(){}); 
            }
          });

        }else{
    
            $.ajax({
                type: 'POST',
                url: '/include/addCart.php?id='+id+'&count='+count,
                data: 'id='+id,
                success: function(data){                         
                  $('.basket__inner').empty();
                  $('.basket__inner').append(data);
                  $('#basket-added-window').show();
                     $(".overlay").fadeIn(100, function(){});
                }
            });
        };


    });
   /*** чтобы работал модалка Вопрос менеждеру ***/

    $(".callback-link").on('click', function(){
        var btn = $(this);                        
        $(".overlay").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 
        var str = $.trim($('#nameprod').html());
        $('#callback-window textarea').val('Вопрос по: ('+str+')');

       $('#callback-window').show();
       $('.product-detail').hide();
        return false;
    });
    


    $(".overlay, .modal-close").on('click', function(){
    $(".overlay, .modal, .product-detail").fadeOut();
    $('.modal').find('input, textarea').val('');
    return false;
    });    


    $('.modal').each(function(){
        var f=$(this).find('.modal-content');
        var t=$(this).find('.modal-content-copy');
        t.html(f.html());
        t.hide();

    });




    /*** Отдельно вынесено чтобы работал крестик Просмотр деталей товара ***/
    $(".product-detail__close").on('click', function(){
        $(".overlay, .product-detail").fadeOut();
    });
    /*****/




    $(".btn.btn_one-click").unbind( "click" );
    $( ".btn.btn_one-click" ).bind( "click", function(){
        //alert('zzz');
        var btn = $(this);                        
        $(".overlay,#overlay").fadeIn(100, function(){
            $($(btn).data('window')).show();                        
        }); 

       $('.product-detail').hide();
       var str = $.trim($('#nameprod').html());
    $('#oneclickorder-window input.reason').val(str);
       $('#oneclickorder-window').show();
        return false;
    });
            }
                    });
});

    
    $(".overlay, .product-detail__close").on('click', function(){
        $(".overlay, .product-detail, #callback-window, #basket-added-window").fadeOut();
    });   


</script>