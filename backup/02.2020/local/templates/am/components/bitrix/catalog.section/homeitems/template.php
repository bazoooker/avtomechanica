<?
foreach ($arResult['ITEMS'] as $key => $arItem){
			$file=CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL_ALT , true); 
			if(!$file['src']) $file['src']="/img/nophoto.jpg";
?>

		<div class="grid-cell">
                <div class="card">
                  <div class="card__header">
                    <div class="card__icon embed-responsive embed-responsive-1by1 mb-3">
                      <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><div class="embed-responsive-item" style="background: url(<?=$file['src']?>) no-repeat center/contain"></div></a>
                    </div>
                    <div class="card__name mb-1"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
                  </div>
                  <div class="card__footer card__footer">
                    <div class="card__price mb-3"><?=pformat($arItem['MIN_PRICE']['VALUE'])?> ₽</div>
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="btn btn-danger rounded-pill btn-small">Купить</a>
                  </div>
                </div>
              </div>
<?
}
?>
