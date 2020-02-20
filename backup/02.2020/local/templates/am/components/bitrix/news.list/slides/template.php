<?
foreach ($arResult['ITEMS'] as $key => $arItem){
?>
             <div class="carousel-cell">
                <div class="container toggle-container">
		<?if($arItem['PROPERTIES']['LINK']['VALUE']!=""){?>
		<a class=d-block href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>"><img class=sliderimg src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"></a>
		<?} else {?>
                  <div class="banner-item text-white">
                    <div class="banner__text w-lg-50 d-flex flex-column">
                      <div class="banner__title pb-4"><?=$arItem['NAME']?></div>
                      <big class="banner__subtitle pb-4"><?=$arItem['PREVIEW_TEXT']?></big>
                      <a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>" class="btn btn-outline-light rounded-pill">Узнать подробнее</a>
                      <div class="square-block"></div>
                    </div>
                  </div>
		<?}?>
                </div>
              </div>

<?
}
?>
