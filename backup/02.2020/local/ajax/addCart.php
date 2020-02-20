<?
header('Expires: Sun, 09 May 2010 06:00:00 GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache'); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");
		
if(isset($_GET['id']) && isset($_GET['count'])){
	Add2BasketByProductID(
	  $_GET['id'], 
	  $_GET['count']
	);	
}

include("small-basket.php");
?>