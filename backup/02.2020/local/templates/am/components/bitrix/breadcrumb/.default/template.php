<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';



$strReturn .= '<div class="container d-none d-md-block"><div class="breadcrumbs mb-4 mt-5">';
                    




$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<a class="breadcrumb-item theme-link" href="'.$arResult[$index]["LINK"].'">'.beautify($title).'</a>';
	}
	else
	{
		$strReturn .= '<a class="breadcrumb-item active theme-link" href="'.$arResult[$index]["LINK"].'">'.beautify($title).'</a>';
	}
}

$strReturn .= '</div></div>';

return $strReturn;
