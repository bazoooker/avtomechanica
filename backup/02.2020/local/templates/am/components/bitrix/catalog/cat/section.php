<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

//print_r($arParams);

$this->setFrameMode(true);

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y')
{
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}
?>
<?
	$res = CIBlockSection::GetByID($arResult["VARIABLES"]["SECTION_ID"]);
	$ar_res = $res->GetNext();
?>


                <div class="container">
                    <h1 class="mb-5"><?=$ar_res['NAME']?></h1>
<?
	if($ar_res['DEPTH_LEVEL']>1) {
?>
                    <div class="row">
                        <div class="col-12 col-lg-4 col-xl-3">

                            <!-- Открытие сортировки на мобилке -->
                            <div class="border-radius bg-whitesmoke d-flex d-lg-none justify-content-center mb-4 px-2 py-3">

                                <button class="btn btn-main btn-no-icon btn-hover-accent mr-3 js-opener js-changer" 
                                    data-target-id="filter"
                                    data-changer-target="overlay" 
                                    data-changer-class="hidden"
                                    data-changer-action="remove">
                                    Фильтр
                                </button>

                                <button class="link theme-link js-opener js-changer" 
                                    data-target-id="catalog-list-top"
                                    data-changer-target="overlay" 
                                    data-changer-class="hidden"
                                    data-changer-action="remove">
                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.18867 5.19795C4.30411 5.32357 4.36748 5.48766 4.36748 5.65742V10.6596C4.36748 10.9606 4.73076 11.1134 4.94578 10.9018L6.34117 9.30266C6.5279 9.07858 6.63089 8.96766 6.63089 8.74586V5.65855C6.63089 5.4888 6.6954 5.3247 6.8097 5.19907L10.8137 0.854441C11.1136 0.528509 10.8827 0 10.4391 0H0.559288C0.11566 0 -0.116339 0.527377 0.184694 0.854441L4.18867 5.19795Z" fill="#0E8EEB"></path>
                                    </svg>&nbsp;
                                    <span class="dashed-link">Cортировка</span>
                                </button>

                            </div>

                            <!-- <aside id="filter" class="filter mb-3"> -->
                            <aside id="filter" class="filter hidden mb-3">

                                <button class="btn-close js-closer js-changer" 
                                    data-target-id="filter"
                                    data-changer-target="overlay" 
                                    data-changer-class="hidden"
                                    data-changer-action="add">
                                </button>

                                <div class="filter-top">
                                    <div class="filter-top-item theme-link js-scroller" data-target="filter-section">
                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.18867 5.19795C4.30411 5.32357 4.36748 5.48766 4.36748 5.65742V10.6596C4.36748 10.9606 4.73076 11.1134 4.94578 10.9018L6.34117 9.30266C6.5279 9.07858 6.63089 8.96766 6.63089 8.74586V5.65855C6.63089 5.4888 6.6954 5.3247 6.8097 5.19907L10.8137 0.854441C11.1136 0.528509 10.8827 0 10.4391 0H0.559288C0.11566 0 -0.116339 0.527377 0.184694 0.854441L4.18867 5.19795Z" fill="#0E8EEB"/>
                                        </svg>
                                        <span>Фильтр</span>
                                    </div>
                                </div>
<?
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"",
					array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
						"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
						"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
						"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
						"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);
?>


					<?
					$APPLICATION->IncludeComponent(
						"bitrix:catalog.smart.filter",
						"",
						array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arCurSection['ID'],
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SAVE_IN_SESSION" => "N",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"XML_EXPORT" => "N",
							"SECTION_TITLE" => "NAME",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							"SEF_MODE" => $arParams["SEF_MODE"],
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
                                    </aside>


              </div>
              <div class="col-12 col-lg-8 col-xl-9">

<?
			
				$sortfield="NAME";
				$sortorder="ASC";
				if($_COOKIE['setsort']=='price'){$sortfield="CATALOG_PRICE_1";}
				if($_COOKIE['setdirection']=='desc'){$sortorder="DESC";}
?>

                            <div class="catalog-list">

                                <!-- к id привязана логика открывания фильтра на мобилке -->
                                <div id="catalog-list-top" class="catalog-list-top hidden">
                                    <div class="d-block d-lg-none">
                                        <button class="btn-close js-closer js-changer" 
                                            data-target-id="catalog-list-top"
                                            data-changer-target="overlay" 
                                            data-changer-class="hidden"
                                            data-changer-action="add">
                                        </button> 
                                    </div>

                                    <div class="catalog-list-total">
                                        <span><b><?=CIBlockSection::GetSectionElementsCount($arResult['VARIABLES']['SECTION_ID'], Array("CNT_ACTIVE"=>"Y"))?> товаров</b></span>
                                    </div>
                                    <div class="catalog-list-sorting">
                                        <span class="mr-3">Сортировать по:</span>

                                        <A href="/local/ajax/setsort.php?sort=price&direction=<?=($sortorder=='ASC')?"desc":"asc"?>" class="sorting-item <?=($sortfield=="CATALOG_PRICE_1"&&$sortorder=='ASC')?"a-z":""?> <?=($sortfield=="CATALOG_PRICE_1"&&$sortorder=='DESC')?"z-a":""?> sorting-price js-sorting-icons-animations <?=($sortfield=='CATALOG_PRICE_1')?"active":""?> js-sorting-products-view mr-4">
                                            <div class="sorting-icon">
                                                <svg width="6" height="12" viewBox="0 0 5 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.89283 9.65882V0.392834C2.89283 0.175878 2.71696 0 2.5 0C2.28304 0 2.10717 0.175878 2.10717 0.392834V9.65882L0.833256 8.38483C0.679854 8.23142 0.431129 8.23142 0.277727 8.38483C0.12434 8.53823 0.12434 8.78692 0.277728 8.94032L2.22225 10.885C2.37571 11.0383 2.6243 11.0383 2.77775 10.885L4.72227 8.94032C4.87566 8.78692 4.87566 8.53823 4.72227 8.38483C4.56887 8.23142 4.32015 8.23142 4.16674 8.38483L2.89283 9.65882Z" fill="#0E8EEB"/>
                                                </svg>
                                                <span class="sorting-icon-line"></span>
                                                <span class="sorting-icon-line"></span>
                                                <span class="sorting-icon-line"></span>
                                            </div>
                                            <span>цене</span>
                                        </a>

                                        <a href="/local/ajax/setsort.php?sort=name&direction=<?=($sortorder=='ASC')?"desc":"asc"?>" class="sorting-item <?=($sortfield=="NAME"&&$sortorder=='ASC')?"a-z":""?> <?=($sortfield=="NAME"&&$sortorder=='DESC')?"z-a":""?> sorting-price js-sorting-icons-animations <?=($sortfield=='NAME')?"active":""?> js-letters-in-name-sorting js-sorting-products-view">
                                            <div class="sorting-icon">
                                                <svg width="6" height="12" viewBox="0 0 5 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.89283 9.65882V0.392834C2.89283 0.175878 2.71696 0 2.5 0C2.28304 0 2.10717 0.175878 2.10717 0.392834V9.65882L0.833256 8.38483C0.679854 8.23142 0.431129 8.23142 0.277727 8.38483C0.12434 8.53823 0.12434 8.78692 0.277728 8.94032L2.22225 10.885C2.37571 11.0383 2.6243 11.0383 2.77775 10.885L4.72227 8.94032C4.87566 8.78692 4.87566 8.53823 4.72227 8.38483C4.56887 8.23142 4.32015 8.23142 4.16674 8.38483L2.89283 9.65882Z" fill="#0E8EEB"/>
                                                </svg>
                                                <span class="sorting-icon-line"></span>
                                                <span class="sorting-icon-line"></span>
                                                <span class="sorting-icon-line"></span>
                                            </div>
                                            <span>названию <span id="sorting-name-letters">А-Я</span></span>
                                        </a>

                                    </div>
                                    <div class="catalog-list-view">
                                        <span class="mr-2">Вид:</span>
                                        <a  href="/local/ajax/setview.php?view=plates" class="view-item js-view-item-animaiton js-view-cards <?=($_COOKIE['setview']=='plates'||!$_COOKIE['setview'])?"active":""?> mr-3">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="0.888672" width="10.5051" height="10.5051" rx="1" fill="#242424"/>
                                                <rect x="13.4941" width="10.5051" height="10.5051" rx="1" fill="#242424"/>
                                                <rect x="0.888672" y="12.6061" width="10.5051" height="10.5051" rx="1" fill="#242424"/>
                                                <rect x="13.4941" y="12.6061" width="10.5051" height="10.5051" rx="1" fill="#242424"/>
                                            </svg>

                                        </a>
                                        <a  href="/local/ajax/setview.php?view=list" class="view-item js-view-item-animaiton js-view-list <?=($_COOKIE['setview']=='list')?"active":""?> mr-3">
                                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="23.1111" height="2.10101" fill="#242424"/>
                                                <rect y="10.505" width="23.1111" height="2.10101" fill="#242424"/>
                                                <rect y="21.0102" width="23.1111" height="2.10101" fill="#242424"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                <!-- div class="sorting-group d-flex align-items-end mb-4">
                  <div class="sort-item mr-5"><span>Сортировать по:</span>

		<a class="text-danger link  mx-sm-3 <?=($sortfield=="NAME")?"active":""?>" href="/includes/setsort.php?sort=name&direction=<?=($sortorder=='ASC')?"desc":"asc"?>">
                      <svg class="svg-sprite-icon icon-Frame mr-2">
			<? if($sortorder=='ASC'){?>
                        <use xlink:href="/img/svg/symbol/asc.svg#Frame"></use>
			<? } else {?>
                        <use xlink:href="/img/svg/symbol/sprite.svg#Frame"></use>
			<? }?>
                      </svg>
			<span class="dotted">названию</span></a>


		<a class="text-danger link <?=($sortfield=="CATALOG_PRICE_1")?"active":""?>" href="/includes/setsort.php?sort=price&direction=<?=($sortorder=='ASC')?"desc":"asc"?>">
                      <svg class="svg-sprite-icon icon-Frame mr-2">
			<? if($sortorder=='ASC'){?>
                        <use xlink:href="/img/svg/symbol/asc.svg#Frame"></use>
			<? } else {?>
                        <use xlink:href="/img/svg/symbol/sprite.svg#Frame"></use>
			<? }?>
                      </svg>
			<span class="dotted">цене</span></a>

		</div>
                  <div class="sort-item sort-item--view-icon">Вид:
                    <svg class="svg-sprite-icon icon-column sort-icon <?=($_COOKIE['setview']=='column'||!$_COOKIE['setview'])?"active":""?>">
                      <use xlink:href="/img/svg/symbol/sprite.svg#column"></use>
                    </svg>
                    <svg class="svg-sprite-icon icon-row sort-icon <?=($_COOKIE['setview']=='row')?"active":""?>">
                      <use xlink:href="/img/svg/symbol/sprite.svg#row"></use>
                    </svg>
                  </div>
                </div -->


<?
				$intSectionID = $APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"",
					array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_SORT_FIELD" => $sortfield,
						"ELEMENT_SORT_ORDER" => $sortorder,
						"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
						"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
						"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
						"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
						"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
						"BASKET_URL" => $arParams["BASKET_URL"],
						"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
						"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
						"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
						"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
						"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"MESSAGE_404" => $arParams["~MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
						"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
						"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
						"PRICE_CODE" => $arParams["~PRICE_CODE"],
						"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
						"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

						"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
						"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
						"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
						"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
						"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"LAZY_LOAD" => $arParams["LAZY_LOAD"],
						"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
						"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

						"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
						"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
						"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
						"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
						"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
						"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
						"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
						"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
						"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
						'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

						'LABEL_PROP' => $arParams['LABEL_PROP'],
						'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
						'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
						'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
						'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
						'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
						'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
						'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
						'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
						'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

						'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
						'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
						'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
						'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
						'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
						'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
						'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
						'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
						'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
						'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
						'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
						'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
						'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
						'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
						'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

						'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
						'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
						'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

						'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
						"ADD_SECTIONS_CHAIN" => "N",
						'ADD_TO_BASKET_ACTION' => $basketAction,
						'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
						'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
						'COMPARE_NAME' => $arParams['COMPARE_NAME'],
						'USE_COMPARE_LIST' => 'Y',
						'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
						'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
						'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
					),
					$component
				);
				?>
              </div>
            </div>


	</div>
<?
	} else { // если попали на вложенность = 1
?>
	<div class="row">
              <div class="col-xl-12">
<?
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"plates",
					array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
						"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
						"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
						"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
						"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);
?>
            </div>
	</div>
<?
	}
?>
</div>


