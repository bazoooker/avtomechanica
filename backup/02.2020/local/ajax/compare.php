<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 
$APPLICATION->IncludeComponent("bitrix:catalog.compare.list", "sravnit_hiden", Array(
	"ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"COMPARE_URL" => "/compare/",	// URL �������� � �������� ���������
		"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
		"IBLOCK_ID" => CATALOG_IBLOCK,	// ��������
		"IBLOCK_TYPE" => "1c_catalog",	// ��� ���������
		"NAME" => "CATALOG_COMPARE_LIST",	// ���������� ��� ��� ������ ���������
		"POSITION" => "top left",	// ��������� �� ��������
		"POSITION_FIXED" => "Y",	// ���������� ������ ��������� ������ ��������
		"PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
	),
	false
);?>