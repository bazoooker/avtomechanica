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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>


<div class="text-center">
<span class="pagination__heading"><?=$arResult["NavTitle"]?>

<!-- åñëè ïî óáûâàþùåé -->
<?if($arResult["bDescPageNumbering"] === true):?>

	<?=$arResult["NavFirstRecordShow"]?>111 <?=GetMessage("nav_to")?> 222 <?=$arResult["NavLastRecordShow"]?>333 <?=GetMessage("nav_of")?>444 <?=$arResult["NavRecordCount"]?>
		
	</span>

	<div class="pagination">
	<div class="pagination__holder">

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<a class="pagination-link pagination-link_disabled pagination-link_beginning" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">
				<!-- <?=GetMessage("nav_begin")?> -->
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				</a>
			
			<a class="pagination-link pagination-link_disabled" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
				<!-- <?=GetMessage("nav_prev")?> --></a>
			
		<?else:?>
			<a class="pagination-link pagination-link_beginning" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
				<!-- <?=GetMessage("nav_begin")?> -->
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
					
				</a>
			<!-- | -->
			<?if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):?>
				<a class="pagination-link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
					<!-- <?=GetMessage("nav_prev")?> --></a>
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				<!-- | -->
			<?else:?>
				<a class="pagination-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
					<!-- <?=GetMessage("nav_prev")?> --></a>
					<i class="fa fa-angle-left" aria-hidden="true"></i>
				<!-- | -->
			<?endif?>
		<?endif?>
	<?else:?>
		<a class="pagination-link pagination-link_beginning">
			<!-- <?=GetMessage("nav_begin")?> -->
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			</a> 
		</a>
		<a class="pagination-link">
			<!-- <?=GetMessage("nav_prev")?> -->
			<i class="fa fa-angle-left" aria-hidden="true"></i>
		</a>
	<?endif?>

	<?while($arResult["nStartPage"] >= $arResult["nEndPage"]):?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<div class="search__pagination-num">
				<b><?=$NavRecordGroupPrint?></b>
			</div>
		<?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
			<a class="" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
		<?else:?>
			<a class="" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>



	<?if ($arResult["NavPageNomer"] > 1):?>
		<a class="" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><i class="fa fa-angle-right" aria-hidden="true"></i><!-- <?=GetMessage("nav_next")?> --></a>
		<!-- | -->
		<a class="pagination-link pagination-link_end" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">
			<!-- <?=GetMessage("nav_end")?> -->
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			</a>
	<?else:?>
		<a class="pagination-link pagination-link_end"><i class="fa fa-angle-right" aria-hidden="true"></i><!-- <?=GetMessage("nav_next")?> --></a>
		<a class="">
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			<!-- <?=GetMessage("nav_end")?> -->
		</a>
	<?endif?>



<?else:?>

	<?=$arResult["NavFirstRecordShow"]?> <?=GetMessage("nav_to")?> - <?=$arResult["NavLastRecordShow"]?> <?=GetMessage("nav_of")?> <?=$arResult["NavRecordCount"]?>
	</span>

<div class="text-center">
	<div class="pagination">

	<div class="pagination__holder">

	<!-- ÊÀÊÀß ÝÒÎ ÑÒÐÀÍÈÖÀ? 
	========================-->

	<!-- åñëè ÍÅ ïåðâàÿ -->
	<?if ($arResult["NavPageNomer"] > 1):?>
		
		<!-- íå íà ïåðâîé -->
		<?if($arResult["bSavePage"]):?>

			<a 	class="pagination-link pagination-link_beginning" 
				href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
				<!-- <?=GetMessage("nav_begin")?> -->
			</a>

			<a 	class="pagination-link" 
				href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<!-- <?=GetMessage("nav_prev")?> -->
				<i class="fa fa-angle-left" aria-hidden="true"></i>
			</a>
		<!-- ÷òî çà óñëîâèå??? -->
		<?else:?>
			<a 	class="pagination-link pagination-link_beginning" 
				href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
				<!-- <?=GetMessage("nav_begin")?> -->
				<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			</a>

			<?if ($arResult["NavPageNomer"] > 2):?>
				<a 	class="pagination-link" 
					href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<!-- <?=GetMessage("nav_prev")?> -->
				</a>
			<?else:?>
				<a 	class="pagination-link" 
					href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<!-- <?=GetMessage("nav_prev")?> -->
				</a>
			<?endif?>
		<?endif?>


	<!-- íå íà ïåðâîé -->
	<?else:?>
		<a class="pagination-link pagination-link_disabled pagination-link_beginning">
			<!-- <?=GetMessage("nav_begin")?> -->
			<i class="fa fa-angle-double-left" aria-hidden="true"></i>
			</a>
		<a class="pagination-link pagination-link_disabled">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
				<!-- <?=GetMessage("nav_prev")?> --></a>
	<?endif?>

	<!-- ========================
	 êàêàÿ ýòî ñòðàíèöà ÊÎÍÅÖ -->




	
	<!-- ÂÛÂÎÄ ÖÈÔÐ ÏÎÑÒÐÀÍÈ×ÍÎ 
	========================-->

	<?
	// while($arResult["nStartPage"] <= $arResult["nEndPage"]):
	 while($arResult["nStartPage"] <= $arResult["NavPageCount"]):
	?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<div class="pagination-link pagination-link_number pagination-link_number-current">
				<?=$arResult["nStartPage"]?>
			</div>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<a class="pagination-link pagination-link_number" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
		<?else:?>
			<a class="pagination-link pagination-link_number" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>

	<!-- ====================
	ÂÛÂÎÄ ÖÈÔÐ ÏÎÑÒÐÀÍÈ×ÍÎ ÊÎÍÅÖ -->



	<!-- íå íà ïîñëåäíåé -->
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<a 	class="pagination-link" 
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			<i class="fa fa-angle-right" aria-hidden="true"></i><!-- <?=GetMessage("nav_next")?> --></a>
		<a 	class="pagination-link pagination-link_end" 
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">
			<!-- <?=GetMessage("nav_end")?> -->
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
				
			</a>


	<!-- íà ïîñëåäíåé -->
	<?else:?>
		<a 	class="pagination-link pagination-link_disabled">
			<i class="fa fa-angle-right" aria-hidden="true"></i><!-- <?=GetMessage("nav_next")?> -->
		</a>
		<a 	class="pagination-link pagination-link_disabled pagination-link_end">
			<i class="fa fa-angle-double-right" aria-hidden="true"></i>
			<!-- <?=GetMessage("nav_end")?> -->
		</a>
	<?endif?>

<?endif?>


<!-- <?if ($arResult["bShowAll"]):?>
<noindex>
	<?if ($arResult["NavShowAll"]):?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow">
			<?=GetMessage("nav_paged")?>
		</a>
	<?else:?>
		<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow">
			<?=GetMessage("nav_all")?>
		</a>
	<?endif?>
</noindex>
<?endif?> -->

</div>
</div>
</div></div>



<?
//	print_r($arResult);
?>
