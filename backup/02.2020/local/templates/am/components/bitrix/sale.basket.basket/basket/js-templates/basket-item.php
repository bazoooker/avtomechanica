<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $mobileColumns
 * @var array $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left' => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right' => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<script id="basket-item-template" type="text/html">

                                    <div class="col-12 col-xl-4 col-lg-6 col-md-4 col-sm-6"  id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
                                        <div class="product border-radius">
                                             <a href="" class="product-img" style="background-image: url({{{IMAGE_URL}}}{{^IMAGE_URL}}/img/nophoto.jpg{{/IMAGE_URL}});"></a>
                                             <div class="product-info">
                                                <a href="{{DETAIL_PAGE_URL}}" class="product-name">
                                                    {{NAME}}
                                                </a>
                                             </div>
                                             <div class="product-price">
                                                 <span class="rub">{{{PRICE}}}</span>
                                             </div>
                                             <div class="product-counter" data-entity="basket-item-quantity-block">
                                                 <div class="counter">
                                                     <span class="counter-control counter-control-minus"  data-entity="basket-item-quantity-minus">
                                                            <svg width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 1H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                            </svg>
                                                     </span>
                                                     <input type="text" class="counter-input" value="{{QUANTITY}}" data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field" id="basket-item-quantity-{{ID}}">
                                                     <span class="counter-control counter-control-plus"  data-entity="basket-item-quantity-plus">
                                                         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                            <path d="M6 11L6 1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                        </svg>
                                                     </span>
                                                 </div>
                                             </div>
			                        <div class="card-item__price card-item__price--total">
							<span  class="rub" id="basket-item-sum-price-{{ID}}">
								{{{SUM_PRICE}}} 
							</span>
						</div>
                                             <div class="product-btn">
			                      <svg class="svg-sprite-icon icon-cross delete-icon"  data-entity="basket-item-delete">
			                        <use xlink:href="/img/svg/symbol/sprite.svg#cross"></use>
			                      </svg>
                                             </div>
                                        </div> <!-- product -->
                                    </div> <!-- col-4 -->


</script>
