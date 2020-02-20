<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
                <div class="container">
                    <div class="row">
<?
		$i=0;
		foreach ($arResult['SECTIONS'] as &$arSection){
?>


                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="catalog-unit js-catalog-unit-hover">
                                <div class="catalog-unit-content">
                                    <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="catalog-unit-header">
                                        <span class="catalog-unit-icon" style="background-image: url(/img/icons/icon-catalog-cateegory.png);"></span>
                                        <p class="mb-0"><strong><?=beautify($arSection['NAME'])?></strong> <sup><?=$arSection['ELEMENT_CNT']?></sup></p>
                                    </a>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"homesections2",
	Array(
		"SECTION_ID"=>$arSection['ID'],
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => CATALOG_IBLOCK,
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("", ""),
		"SECTION_URL" => "/catalog/#ID#/",
		"SECTION_USER_FIELDS" => array("", ""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE"
	)
);?>


                                </div> <!-- catalog-unit-content -->

                            </div> <!-- catalog-unit -->
                        </div> <!-- col-lg-4 -->





<?
	}
?>

		</div>
	</div>

