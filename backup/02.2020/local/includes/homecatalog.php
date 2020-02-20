                <h2 class="h2 text-center">Каталог товаров</h2>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"homesections1", 
	array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => CATALOG_IBLOCK,
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_URL" => "/catalog/#ID#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "homesections1",
		"SECTION_ID" => "0",
		"FILTER_NAME" => "sectionsFilter",
		"CACHE_FILTER" => "N"
	),
	false
);?>



