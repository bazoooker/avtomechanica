<?foreach($arResult["ITEMS"] as $arItem):?>
              <div class="col-md-3"><a class="news-link news-item news-item--2 news-item d-none d-md-block" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                  <div class="embed-responsive embed-responsive-1by1 mb-3">
                    <div class="embed-responsive-item zoom-animation" style="background: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>) no-repeat center/cover"></div>
                  </div>
                  <div class="news-item__date"><?=$arItem['DATE_ACTIVE']?></div>
                  <div class="news-item__name"><?=$arItem['NAME']?></div>
                  <div class="news-item__desc"><?=$arItem['PREVIEW_TEXT']?></div></a>
              </div>
<?endforeach;?>
