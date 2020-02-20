<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<?
/*
$arElements = $APPLICATION->IncludeComponent(
	"bitrix:search.page",
	".default",
	Array(
		"RESTART" => $arParams["RESTART"],
		"NO_WORD_LOGIC" => $arParams["NO_WORD_LOGIC"],
		"USE_LANGUAGE_GUESS" => $arParams["USE_LANGUAGE_GUESS"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
		"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
		"USE_TITLE_RANK" => "Y",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => 20000,
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
	),
	$component,
	array('HIDE_ICONS' => 'Y')
); 
*/
//print_r($arElements);

	$arElements=array();
	global $arRankedElements;
	global $_REQUEST;
	$obTitle = new CSearchTitle;
	if($obTitle->Search(
		$_REQUEST["q"]
		,5000
		,array()
		,false
		,"rank"
	)) {
		while($ar = $obTitle->Fetch()) {
			$arElements[$ar['ID']]=$ar['ITEM_ID'];
//			echo $ar['ITEM_ID']." ".$ar['NAME']."<br>";
		}
	}
	$arRankedElements=$arElements;

?>
<? if (!empty($arElements) && is_array($arElements))
{
?>


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
                                        <span><b><?=count($arElements)?> товаров</b></span>
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





<div class="search-results-list">
<?
	global $searchFilter;
	$searchFilter = array(
		"=ID" => $arElements,
	); $APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
			"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],

			"PAGE_ELEMENT_COUNT" => 20, //$arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => $arParams["OFFERS_LIMIT"],
			"SECTION_URL" => $arParams["SECTION_URL"],
			"DETAIL_URL" => $arParams["DETAIL_URL"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"DISPLAY_COMPARE" => $arParams["DISPLAY_COMPARE"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
			"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
			"CURRENCY_ID" => $arParams["CURRENCY_ID"],
			"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => "round",
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"FILTER_NAME" => "searchFilter",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_USER_FIELDS" => array(),
			"INCLUDE_SUBSECTIONS" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"META_KEYWORDS" => "",
			"META_DESCRIPTION" => "",
			"BROWSER_TITLE" => "",
			"ADD_SECTIONS_CHAIN" => "N",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
		),
		$arResult["THEME_COMPONENT"],
		array('HIDE_ICONS' => 'Y')
	);
?>
</div class="search-results-list">
<?
}
elseif (is_array($arElements))
{
	echo("<p><b>");
	echo GetMessage("CT_BCSE_NOT_FOUND");
?>
<br/>
<br/>
<br/>
<br/>
<br/>
<?
	echo("</b></p>");
}
?>




