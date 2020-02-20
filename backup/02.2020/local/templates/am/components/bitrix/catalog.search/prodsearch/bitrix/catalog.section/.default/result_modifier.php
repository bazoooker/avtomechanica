<?
global $arRankedElements;

$sorted=array();
$etalon=array();
$i=0;
foreach ($arRankedElements as $key => $value){
	$etalon[$value]=$i++;
}


if($arParams["ELEMENT_SORT_FIELD"]=='RANK'){
	foreach ($arResult['ITEMS'] as $key => $arItem){
		$id=$arItem['ID'];
		$pos=$etalon[$id];
		$sorted[$pos]=$arItem;
	}
	$arResult['ITEMS']=$sorted;
	ksort($arResult['ITEMS']);
}

//print_r($arResult['ITEMS']);


	$itms=array();
	foreach ($arResult['ITEMS'] as $key => $arItem){
		$minpriceabs=99999999;
		$minprice=array();
		foreach($arItem['PRICE_MATRIX']['MATRIX'] as $price) {
			if ($minpriceabs>=$price['ZERO-INF']['PRICE']) {
				$minprice=$price['ZERO-INF'];
			}
		}
		$minprice['PRINT_VALUE_VAT']=$minprice['PRICE']." руб.";
		$arItem['MIN_PRICE']=$minprice;
		$itms[]=$arItem;
	}
        $arResult['ITEMS']=$itms;


?>