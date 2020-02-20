



<?
if(!$arResult['DETAIL_PICTURE']['SRC']) {
$arResult['DETAIL_PICTURE']['SRC']="/img/nobigphoto.jpg";
}

?>









                <div class="container">
                    <h1 class="mb-5"><?=beautify($arResult['NAME'])?></h1>
                    
                    <div class="row">

                        <div class="col-12 col-xl-6 col-lg-5 col-md-4 col-sm-3">
                            <a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" class="photo photo-contain photo-ratio-1x1 border-radius box-shadow product-photo" data-lightbox="about">
                                <span class="photo-zoomer" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>);"></span>
                            </a>
                        </div>
                        <div class="col-12 col-xl-6 col-lg-7 col-md-8 col-sm-9">

                            <div class="product-detail">
                                <div class="product-detail-controls">

                                    <span class="product-detail-price">
                                        <span class="rub"><?=pformat($arResult['MIN_PRICE']['VALUE']);?></span>
                                    </span>


                                    <div class="product-detail-counter">
                                         <div class="counter">
                                             <span class="counter-control counter-control-minus">
                                                    <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H11" stroke="white" stroke-width="2" stroke-linecap="round"></path>
                                                    </svg>
                                             </span>
                                             <input type="text" class="counter-input" value="1" rel="<?=$arResult['ID']?>">
                                             <span class="counter-control counter-control-plus">
                                                 <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="white" stroke-width="2" stroke-linecap="round"></path>
                                                    <path d="M6 11L6 1" stroke="white" stroke-width="2" stroke-linecap="round"></path>
                                                </svg>
                                             </span>
                                         </div>
                                     </div>

                                     <div class="product-detail-btn">                                                 
                                        <a href="#" rel="<?=$arResult['ID']?>" class="btn btn-main btn-fancy-basket btn-hover-accent js-message" data-message="В корзине!"><!-- кнопка -->
                                            <span><b>Купить</b></span>
                                            <span class="fancy-basket-icon">         
                                                <svg class="basket-icon-bottom" width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.2403 0.756148H18.84C19.0044 1.67908 18.6096 2.65199 17.7653 3.17439C17.3922 3.40502 16.9641 3.52706 16.5267 3.52706C15.7039 3.52706 14.9544 3.10972 14.5221 2.41056C14.2163 1.91608 14.1172 1.3239 14.2196 0.756104H7.78057C7.88244 1.3239 7.78339 1.91604 7.47769 2.41087C7.04569 3.10967 6.2962 3.52702 5.47339 3.52702C5.03574 3.52702 4.60769 3.40498 4.23435 3.17434C3.39021 2.65195 2.99532 1.67904 3.15989 0.756104H1.75969C0.787675 0.756104 0 1.54378 0 2.51579C0 3.48726 0.787675 4.27489 1.75969 4.27489H1.95379L3.24424 12.1232C3.37954 12.9442 4.08892 13.5471 4.92146 13.5471H17.0785C17.911 13.5471 18.6204 12.9442 18.7556 12.1232L20.0456 4.27498H20.2403C21.2122 4.27498 22 3.48726 22 2.51583C22 1.54382 21.2121 0.756148 20.2403 0.756148ZM7.50337 11.5112C7.45022 11.519 7.3976 11.5231 7.34548 11.5231C6.83191 11.5231 6.38176 11.1471 6.30261 10.6237L5.57181 5.75276C5.48527 5.17596 5.88244 4.63855 6.45925 4.552C7.03677 4.46797 7.57311 4.86264 7.66001 5.43908L8.39099 10.3104C8.47754 10.8871 8.08018 11.4246 7.50337 11.5112ZM12.0559 10.4669C12.0559 11.0503 11.5835 11.523 11.0003 11.523C10.417 11.523 9.94479 11.0502 9.94479 10.4669V5.59568C9.94479 5.01287 10.417 4.54008 11.0003 4.54008C11.5835 4.54008 12.0559 5.01287 12.0559 5.59568V10.4669ZM16.4285 5.75268L15.6972 10.6236C15.6186 11.1471 15.1685 11.523 14.6549 11.523C14.6026 11.523 14.5501 11.5189 14.4969 11.5111C13.9201 11.4246 13.5229 10.887 13.6094 10.3103L14.3403 5.43899C14.4271 4.86219 14.9613 4.46501 15.541 4.55187C16.1176 4.63841 16.515 5.17591 16.4285 5.75268Z" fill="#242424"></path>
                                                </svg>
                                                <svg class="basket-icon-right" width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.99753 6.55485C3.80804 7.02566 3.83225 7.57562 4.11984 8.0406C4.43209 8.54552 4.97233 8.8233 5.52592 8.8233C5.82302 8.8233 6.12343 8.74348 6.39444 8.57586C7.16975 8.09586 7.40957 7.07756 6.92944 6.30158C6.64269 5.83673 6.16099 5.56988 5.6558 5.52928L2.52069 0.4627C2.33631 0.164034 2.01734 0 1.69071 0C1.51596 0 1.33866 0.047507 1.17857 0.146241C0.72062 0.430073 0.580072 1.03014 0.862246 1.48827L3.99753 6.55485Z" fill="#242424"></path>
                                                </svg>
                                                <svg class="basket-icon-left" width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.60506 8.57586C1.87563 8.74348 2.1764 8.8233 2.47359 8.8233C3.02669 8.8233 3.56746 8.54548 3.87917 8.0406C4.16668 7.57562 4.19142 7.02566 4.00193 6.55485L7.13681 1.48827C7.4201 1.03014 7.27843 0.430073 6.8203 0.146241C6.66048 0.047507 6.48318 0 6.30835 0C5.9818 0 5.66288 0.164078 5.47796 0.4627L2.34411 5.52928C1.83848 5.56988 1.35722 5.83673 1.06971 6.30158C0.589399 7.0776 0.829758 8.09586 1.60506 8.57586Z" fill="#242424"></path>
                                                </svg>
                                            </span>
                                        </a><!-- кнопка конец -->                                                
                                     </div>

                                     <div class="product-detail-sorting">
                                         <a href="#" class="btn-sort-round js-message" data-message="В списке сравнения!" rel="<?=$arResult['ID']?>">
                                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 18V8M9 18V0M16 18V3" stroke="#0E8EEB" stroke-width="3"></path>
                                            </svg>
                                         </a>
                                     </div>
                                </div>

                                <div class="product-detail-info">
                                    <div class="tabs">
<?
if(trim($arResult['DETAIL_TEXT'])!=""){
?>
                                        <div class="tab-item active font-primary js-tab" data-target="tab-content-1">
                                            <span class="dashed-link text-size-22">Описание</span>
                                        </div>
<?
}
?>
                                        <div class="tab-item font-primary <?if(!trim($arResult['DETAIL_TEXT'])){?>active <?}?>js-tab" data-target="tab-content-2">
                                            <span class="dashed-link text-size-22">Характеристики</span>
                                        </div>
                                        <div class="tab-item font-primary js-tab" data-target="tab-content-3">
                                            <span class="dashed-link text-size-22">Оплата и доставка</span>
                                        </div>
                                    </div>
<?
if(trim($arResult['DETAIL_TEXT'])){
?>
                                    <div class="tab-container" id="tab-content-1">
                                        <p>
						<?=$arResult['DETAIL_TEXT']?>
                                        </p>
<!-- ?$APPLICATION->IncludeComponent(
    "bitrix:catalog.store.amount",
    "",
    Array(
        "STORES" => array(),
        "ELEMENT_ID" => $arResult['ID'],
        "ELEMENT_CODE" => "",
        "OFFER_ID" => "",
    )
);? -->



                                    </div>
<?
}
?>
                                    <div class="tab-container" id="tab-content-2" <?if(trim($arResult['DETAIL_TEXT'])){?>style="display: none;"<?}?>>
                                        <div class="table-resp">

<?
	$rejectprops=array("Максимальная скидка", "Наличие", "Реквизиты", "Ставки налогов","Краткое описание","Базовая единица","Картинки","Файлы","Ответственный менеджер", "ШтрихКод","Характеристики","Ставки налогов","Это новинка","Можем привезти под заказ","Заказная позиция","Новинка каталога");
	//$rejectprops=array("Наличие", "Реквизиты", "Ставки налогов","Краткое описание","Базовая единица","Картинки","Файлы","Ответственный менеджер");
	foreach($arResult['PROPERTIES'] as $key=>$prop){
		if($prop['VALUE']&&!in_array($prop['NAME'],$rejectprops)){
?>
                                            <div class="table-resp-row">
                                                <div class="table-data"><?=$prop['NAME']?></div>
                                                <div class="table-data"><?=$prop['VALUE']?></div>
                                            </div>
<?
		}
	}
?>
                                        </div>
                                    </div>
                                    <div class="tab-container" id="tab-content-3" style="display: none;">
                                        <p>
                                            <strong>Безналичный расчет.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde sit velit debitis et vitae excepturi molestias numquam aut iste voluptate doloribus mollitia aliquid, labore consequatur explicabo ducimus.
                                        </p>
                                        <p>
                                            <strong>Наличный расчет.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde sit velit debitis et vitae excepturi molestias numquam aut iste voluptate doloribus mollitia aliquid, labore consequatur explicabo ducimus.
                                        </p>
                                        <p>
                                            <strong>Доставка по РФ.</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde sit velit debitis et vitae excepturi molestias numquam aut iste voluptate doloribus mollitia aliquid, labore consequatur explicabo ducimus.
                                        </p>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>



                    <h2>Похожие товары</h2>
                    
                    <div class="catalog-list view-cards mb-5">
                        
                        <div class="row">
                            

<?
	global $arrFilter;
	$arrFilter=array("SECTION_ID"=>$arResult['SECTION_ID']);
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"related", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"BRAND_PROPERTY" => "BRAND_REF",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"CUSTOM_FILTER" => "",
		"DATA_LAYER_NAME" => "dataLayer",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "rand",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "NEWPRODUCT",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => CATALOG_IBLOCK,
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
			0 => "NEWPRODUCT",
		),
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "ARTNUMBER",
			1 => "COLOR_REF",
			2 => "SIZES_SHOES",
			3 => "SIZES_CLOTHES",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"OFFERS_PROPERTY_CODE" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "COLOR_REF",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
		),
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "4",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "Типовое соглашение",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
			0 => "NEWPRODUCT",
			1 => "MATERIAL",
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':true}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "",
		),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => $arResult['IBLOCK_SECTION_ID'],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "carousel",
		"BACKGROUND_IMAGE" => "-",
		"DISPLAY_COMPARE" => "N"
	),
	false
);?>



                        </div>
                    </div>
                </div>

















