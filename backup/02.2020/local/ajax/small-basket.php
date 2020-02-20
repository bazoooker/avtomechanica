<?

header('Expires: Sun, 09 May 2010 06:00:00 GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache'); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php"); 

			if (CModule::IncludeModule("sale")) {
				$arBasketItems = array();
				$dbBasketItems = CSaleBasket::GetList(
					array(
						"NAME" => "ASC",
						"ID" => "ASC"
					),
					array(
						"FUSER_ID" => CSaleBasket::GetBasketUserID(),
						"DELAY" => "N",
						"CAN_BUY" => "Y",
						"LID" => SITE_ID,
						"ORDER_ID" => "NULL"
					),
					false,
					false,
					array("ID", "QUANTITY", "PRICE")
				);
				while ($arItems = $dbBasketItems->Fetch()) {
					$arBasketItems[] = $arItems;
				}
			}
			
echo count ($arBasketItems);  
?>