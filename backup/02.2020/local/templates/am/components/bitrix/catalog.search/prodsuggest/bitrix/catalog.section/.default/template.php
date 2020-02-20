<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
//print_r($arResult);
?>
						<div class="items">

















<?
foreach ($arResult['ITEMS'] as $key => $arItem){
			$file=CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>180, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true); 
//	print_r($arItem['PRICE_MATRIX']['MATRIX'][1][0]['PRICE']);
			if(!$file['src']) $file['src']="/img/nophoto.jpg";
?>
<div class="itemholder">
<a class="item itembig" href="<?=$arItem['DETAIL_PAGE_URL']?>">
	<div class="img">
		<!-- img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" / -->
		<img src="<?=$file['src']?>">
	</div>
	<div class="info">

		<div class="title"><?=$arItem['NAME']?></div>
		<div class="price"><?=pformat(intVal($arItem['PRICE_MATRIX']['MATRIX'][1]['1-INF']['PRICE']))?> <sup>руб.</sup></div>
		<div class="buy">Купить</div>
	</div>
	<div class="clear"></div>
</a>
</div>							



<?
}
?>
							<div class=clear></div>
						</div>

<? echo $arResult["NAV_STRING"]; ?>
