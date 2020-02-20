<?
foreach ($arResult['ITEMS'] as $key => $arItem){
?>
              <div class="carousel-cell embed-responsive embed-responsive-21by9 mb-3">
                <div class="embed-responsive-item" style="background: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>') no-repeat center/contain"></div>
              </div>
<?
}
?>