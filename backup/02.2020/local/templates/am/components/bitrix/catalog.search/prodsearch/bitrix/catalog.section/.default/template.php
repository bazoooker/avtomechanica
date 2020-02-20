




                            <div class="catalog-list <?=($_COOKIE['setview']=='list')?"view-list":"view-cards"?> mb-5 ">
                                <div class="row"  id="cards-container">

<?
foreach ($arResult['ITEMS'] as $key => $arItem){
			if(!$arItem['PREVIEW_PICTURE']['SRC']) $arItem['PREVIEW_PICTURE']['SRC']="/img/nophoto.jpg";
?>


                                    <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                        <div class="product border-radius">
                                             <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></a>
                                             <div class="product-info">
                                                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="product-name">
                                                    <?=beautify($arItem['NAME'])?>
                                                </a>
                                                <!-- div class="product-params text-muted">
                                                    <div class="product-param-item">
                                                        <span>Артикул: 61166</span>
                                                    </div>
                                                    <div class="product-param-item">
                                                        <span>Бренд: Sivik</span>
                                                    </div>
                                                    <div class="product-param-item">
                                                        <span>Тип станка: Автомат</span>
                                                    </div>
                                                </div-->                                                 
                                             </div>
                                             <div class="product-price">
                                                 <span class="rub"><?=pformat($arItem['MIN_PRICE']['VALUE'])?></span>
                                             </div>
                                             <div class="product-counter">
                                                 <div class="counter">
                                                     <span class="counter-control counter-control-minus">
                                                            <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                     </span>
                                                     <input type="text" class="counter-input" value="1"  rel="<?=$arItem['ID']?>">
                                                     <span class="counter-control counter-control-plus">
                                                         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M6 11L6 1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                        </svg>
                                                     </span>
                                                 </div>
                                             </div>
                                             <div class="product-btn">                                                 
                                                <a href="#"  rel="<?=$arItem['ID']?>" class="btn btn-main btn-fancy-basket btn-hover-accent js-message" data-message="В корзине!"><!-- кнопка -->
                                                    <span><b>Купить</b></span>
                                                    <span class="fancy-basket-icon">         
                                                        <svg class="basket-icon-bottom" width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M20.2403 0.756148H18.84C19.0044 1.67908 18.6096 2.65199 17.7653 3.17439C17.3922 3.40502 16.9641 3.52706 16.5267 3.52706C15.7039 3.52706 14.9544 3.10972 14.5221 2.41056C14.2163 1.91608 14.1172 1.3239 14.2196 0.756104H7.78057C7.88244 1.3239 7.78339 1.91604 7.47769 2.41087C7.04569 3.10967 6.2962 3.52702 5.47339 3.52702C5.03574 3.52702 4.60769 3.40498 4.23435 3.17434C3.39021 2.65195 2.99532 1.67904 3.15989 0.756104H1.75969C0.787675 0.756104 0 1.54378 0 2.51579C0 3.48726 0.787675 4.27489 1.75969 4.27489H1.95379L3.24424 12.1232C3.37954 12.9442 4.08892 13.5471 4.92146 13.5471H17.0785C17.911 13.5471 18.6204 12.9442 18.7556 12.1232L20.0456 4.27498H20.2403C21.2122 4.27498 22 3.48726 22 2.51583C22 1.54382 21.2121 0.756148 20.2403 0.756148ZM7.50337 11.5112C7.45022 11.519 7.3976 11.5231 7.34548 11.5231C6.83191 11.5231 6.38176 11.1471 6.30261 10.6237L5.57181 5.75276C5.48527 5.17596 5.88244 4.63855 6.45925 4.552C7.03677 4.46797 7.57311 4.86264 7.66001 5.43908L8.39099 10.3104C8.47754 10.8871 8.08018 11.4246 7.50337 11.5112ZM12.0559 10.4669C12.0559 11.0503 11.5835 11.523 11.0003 11.523C10.417 11.523 9.94479 11.0502 9.94479 10.4669V5.59568C9.94479 5.01287 10.417 4.54008 11.0003 4.54008C11.5835 4.54008 12.0559 5.01287 12.0559 5.59568V10.4669ZM16.4285 5.75268L15.6972 10.6236C15.6186 11.1471 15.1685 11.523 14.6549 11.523C14.6026 11.523 14.5501 11.5189 14.4969 11.5111C13.9201 11.4246 13.5229 10.887 13.6094 10.3103L14.3403 5.43899C14.4271 4.86219 14.9613 4.46501 15.541 4.55187C16.1176 4.63841 16.515 5.17591 16.4285 5.75268Z" fill="#242424"/>
                                                        </svg>
                                                        <svg class="basket-icon-right" width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.99753 6.55485C3.80804 7.02566 3.83225 7.57562 4.11984 8.0406C4.43209 8.54552 4.97233 8.8233 5.52592 8.8233C5.82302 8.8233 6.12343 8.74348 6.39444 8.57586C7.16975 8.09586 7.40957 7.07756 6.92944 6.30158C6.64269 5.83673 6.16099 5.56988 5.6558 5.52928L2.52069 0.4627C2.33631 0.164034 2.01734 0 1.69071 0C1.51596 0 1.33866 0.047507 1.17857 0.146241C0.72062 0.430073 0.580072 1.03014 0.862246 1.48827L3.99753 6.55485Z" fill="#242424"/>
                                                        </svg>
                                                        <svg class="basket-icon-left" width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1.60506 8.57586C1.87563 8.74348 2.1764 8.8233 2.47359 8.8233C3.02669 8.8233 3.56746 8.54548 3.87917 8.0406C4.16668 7.57562 4.19142 7.02566 4.00193 6.55485L7.13681 1.48827C7.4201 1.03014 7.27843 0.430073 6.8203 0.146241C6.66048 0.047507 6.48318 0 6.30835 0C5.9818 0 5.66288 0.164078 5.47796 0.4627L2.34411 5.52928C1.83848 5.56988 1.35722 5.83673 1.06971 6.30158C0.589399 7.0776 0.829758 8.09586 1.60506 8.57586Z" fill="#242424"/>
                                                        </svg>
                                                    </span>
                                                </a><!-- кнопка конец -->                                                
                                             </div> <!-- product-btn -->
                                        </div> <!-- product -->
                                    </div> <!-- col-4 -->

                                    <!-- один товар КОНЕЦ -->
<?
}
?>
                  </div>
                </div>
<div id=ajaxLoader></div>
<? echo $arResult["NAV_STRING"]; ?>



	<div style="display:none" id="paginationcontainer"></div>
	<div style="display:none" id="loadedelements"></div>
	<script type="text/javascript">
        $(function() {
		$('#paginationcontainer').html($('.pagination').html());
		$('.pagination__heading, .pagination').remove();
		$('.product-list-container-default>.text-center').remove();
        
		var $nextPageToLoad = 2;
		var $pagesCnt = $('#paginationcontainer .pagination-link_number').length;
		var $canAddItems = ($pagesCnt >= $nextPageToLoad);
		$(window).bind('scroll', function() {
                	if (!$canAddItems) { return; }
			console.log(($(document).scrollTop() + $(window).height()) +'---'+ $('.wrapper').height());
			if (($(document).scrollTop() + $(window).height()) > $('.wrapper').height()) {
				//
				$('#ajaxLoader').show();
				$canAddItems = false;
				$('.pagination__heading, .pagination').remove();
				var $url = $('#paginationcontainer .pagination-link_number:eq('+($nextPageToLoad-1)+')').attr('href');//'/catalog/<?=$arResult['VARIABLES']['SECTION_ID']?>/?PAGEN_1='+$nextPageToLoad;
				$("#loadedelements").load($url +  " #cards-container" , function() {
					$("#cards-container").append($('#loadedelements #cards-container').html());
					$("#loadedelements").html('');
					$canAddItems = ($pagesCnt > $nextPageToLoad);
					$('#ajaxLoader').hide();
					$nextPageToLoad++;
					$('.pagination__heading, .pagination').remove();
					$('.product-list-container-default>.text-center').remove();
					bind_cart_events();
				});
			}
		});
	});
        </script>
