<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	if(count($arResult['SECTIONS'])>0){
?>
                                <div class="filter-categories bg-primary-lines border-radius mb-4">
                                    <div class="filter-categories-list mb-3">
        				       <div class="subsection-list mb-4">
<?
			foreach ($arResult['SECTIONS'] as &$arSection)	{
?>
                                        <a class="filter-category-item" href="<?=$arSection['SECTION_PAGE_URL']?>">
						<?=$arSection['NAME']?><sup><?=$arSection['ELEMENT_CNT']?></sup>
                                        </a>
<?
			}
?>
						</div>
                                    </div>
				</div>
<?
	}
?>

