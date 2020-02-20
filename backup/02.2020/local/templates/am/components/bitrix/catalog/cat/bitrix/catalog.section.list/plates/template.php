<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//	print_r($arResult);
	if(count($arResult['SECTIONS'])>0){
?>

                            <div class="catalog-list view-cards mb-5">
                                <div class="row">
<?
			foreach ($arResult['SECTIONS'] as &$arSection)	{

$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE");
$arFilter = Array("IBLOCK_ID"=>$arResult['SECTION']['IBLOCK_ID'], "ACTIVE"=>"Y","SECTION_ID"=>$arSection['ID'],"INCLUDE_SUBSECTIONS"=>"Y",">PREVIEW_PICTURE"=>"0");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$section_picture="/img/nophoto.jpg";
if($ob = $res->GetNextElement()) {
	$arFields = $ob->GetFields();
	$section_picture=CFile::GetPath($arFields['PREVIEW_PICTURE']);
}

?>



                                    <!-- один товар -->

                                    <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                        <div class="product border-radius">
                                             <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="product-img" style="background-image: url(<?=$section_picture?>);"></a>
                                             <div class="product-info">
                                                <a href="<?=$arSection['SECTION_PAGE_URL']?>" class="product-name">
                                                    <?=$arSection['NAME']?> <sup><?=$arSection['ELEMENT_CNT']?></sup>
                                                </a>
                                             </div>
                                        </div> <!-- product -->
                                    </div> <!-- col-4 -->

                                    <!-- один товар КОНЕЦ -->

<?
			}
?>
                	</div>

		</div>
<?
}
?>
