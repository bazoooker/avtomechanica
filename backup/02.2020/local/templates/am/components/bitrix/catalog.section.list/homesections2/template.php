<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


                                    <ul class="catalog-unit-list d-none d-lg-block">
<?
		foreach ($arResult['SECTIONS'] as &$arSection){
?>
                                        <li class="catalog-unit-item">
                                            <a class="theme-link" href="<?=$arSection['SECTION_PAGE_URL']?>"><?=beautify($arSection['NAME'])?> <sup><?=$arSection['ELEMENT_CNT']?></sup> </a>
                                        </li>
                                        <i class="catalog-unit-divider"></i>
<?
		}
?>
                                    </ul>
