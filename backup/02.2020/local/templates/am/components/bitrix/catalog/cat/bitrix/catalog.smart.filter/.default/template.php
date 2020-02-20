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

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);

if (isset($templateData['TEMPLATE_THEME']))
{
//	$this->addExternalCss($templateData['TEMPLATE_THEME']);
}
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
//$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>


                                <div id="filter-section" class="filter-parameters border-radius bg-gray">
                                    <p class="text-size-26 font-secondary mt-0 mb-4"><b>Фильтр</b></p>


<?
//	print_r($arResult);
?>

		<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter filtr-block mb-5">
			<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
			<?endforeach;?>
				<?foreach($arResult["ITEMS"] as $key=>$arItem)//prices
				{
					$key = $arItem["ENCODED_ID"];
					if(isset($arItem["PRICE"])):
						if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
							continue;

						$step_num = 4;
						$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
						$prices = array();
						if (Bitrix\Main\Loader::includeModule("currency"))
						{
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
							}
							$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
						}
						else
						{
							$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
							for ($i = 0; $i < $step_num; $i++)
							{
								$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
							}
							$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
						}
						?>
                                    <div class="bx-filter-parameters-box filter-accordeon active">
					<span class="bx-filter-container-modef"></span>
                                        <div class="filter-accordeon-label js-filter-accordeon">Цена</div>
                                        <div class="filter-accordeon-content">

                                    <div class="price-range mb-4">
                                        <div class="mb-2">
                                            <input type="text" class="js-range-slider-<?=$arItem['ID']?>" name="my_range" value=""
                                                data-type="double"
                                                data-min="<?echo (int)floor($arItem["VALUES"]["MIN"]["VALUE"])?>"
                                                data-max="<?echo (int)ceil($arItem["VALUES"]["MAX"]["VALUE"])?>"
                                                data-from="<?echo (int)floor(($arItem["VALUES"]["MIN"]["HTML_VALUE"])?$arItem["VALUES"]["MIN"]["HTML_VALUE"]:$arItem["VALUES"]["MIN"]["VALUE"])?>"
                                                data-to="<?echo (int)ceil(($arItem["VALUES"]["MAX"]["HTML_VALUE"])?$arItem["VALUES"]["MAX"]["HTML_VALUE"]:$arItem["VALUES"]["MAX"]["VALUE"])?>"
                                            />
                                        </div>
                                        <div class="range-numbers">
                                            <input class="range-input" type="text" 
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo (int)floor(($arItem["VALUES"]["MIN"]["HTML_VALUE"])?$arItem["VALUES"]["MIN"]["HTML_VALUE"]:$arItem["VALUES"]["MIN"]["VALUE"])?>"
												onkeyup="smartFilter.keyup(this)"
						>
                                            &mdash;
                                            <input class="range-input" type="text" 
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo (int)ceil(($arItem["VALUES"]["MAX"]["HTML_VALUE"])?$arItem["VALUES"]["MAX"]["HTML_VALUE"]:$arItem["VALUES"]["MAX"]["VALUE"])?>"
												onkeyup="smartFilter.keyup(this)"
						>
                                        </div>
                                    </div>

<script>
$(document).ready(function(){
    $(".js-range-slider-<?=$arItem['ID']?>").ionRangeSlider({
        skin: "round",
        type: "double",
        min: <?echo (int)floor($arItem["VALUES"]["MIN"]["VALUE"])?>,
        max: <?echo (int)ceil($arItem["VALUES"]["MAX"]["VALUE"])?>,
        from: <?echo (int)floor(($arItem["VALUES"]["MIN"]["HTML_VALUE"])?$arItem["VALUES"]["MIN"]["HTML_VALUE"]:$arItem["VALUES"]["MIN"]["VALUE"])?>,
        to: <?echo (int)ceil(($arItem["VALUES"]["MAX"]["HTML_VALUE"])?$arItem["VALUES"]["MAX"]["HTML_VALUE"]:$arItem["VALUES"]["MAX"]["VALUE"])?>,
        hide_min_max: true,
        onChange: function(data) {
		$('#<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>').val(data.from).keyup();
		$('#<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>').val(data.to).keyup();
        }
    });
});
</script>

							</div>
						</div>

<?
//print_r($arItem);
?>

						<!-- div class="bx-filter-parameters-box bx-active">
							<span class="bx-filter-container-modef"></span>
							<div class="bx-filter-parameters-box-title" onclick="smartFilter.hideFilterProps(this)"><span>Цена, ₽ <i data-role="prop_angle" class="fa fa-angle-<?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>up<?else:?>down<?endif?>"></i></span></div>
							<div class="bx-filter-block" data-role="bx_filter_block">
								<div class="bx-filter-parameters-box-container">
									<div class="row">
									<div class="col-6 bx-filter-parameters-box-container-block bx-left">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_FROM")?></i>
										<div class="bx-filter-input-container">
											<input
												class="min-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									<div class="col-6 bx-filter-parameters-box-container-block bx-right">
										<i class="bx-ft-sub"><?=GetMessage("CT_BCSF_FILTER_TO")?></i>
										<div class="bx-filter-input-container">
											<input
												class="max-price"
												type="text"
												name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
												id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
												value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
												size="5"
												onkeyup="smartFilter.keyup(this)"
											/>
										</div>
									</div>
									</div>
									<div class="row">
									<div class="col-12 col-xs-offset-1 bx-ui-slider-track-container">
										<div class=padder7px>
										<div class="bx-ui-slider-track" id="drag_track_<?=$key?>">

											<?for($i = 0; $i <= $step_num; $i++):?>
											<div class="bx-ui-slider-part p<?=$i+1?>"><span><?=$prices[$i]?></span></div>
											<?endfor;?>

											<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
											<div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
											<div class="bx-ui-slider-range" id="drag_tracker_<?=$key?>"  style="left: 0%; right: 0%;">
												<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
												<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
											</div>
										</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div -->
						<?
						$arJsParams = array(
							"leftSlider" => 'left_slider_'.$key,
							"rightSlider" => 'right_slider_'.$key,
							"tracker" => "drag_tracker_".$key,
							"trackerWrap" => "drag_track_".$key,
							"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
							"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
							"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
							"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
							"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
							"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
							"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
							"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
							"precision" => $precision,
							"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
							"colorAvailableActive" => 'colorAvailableActive_'.$key,
							"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
						);
						?>
						<script type="text/javascript">
							BX.ready(function(){
								window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
							});
						</script>
					<?endif;
				}

				//not prices
				foreach($arResult["ITEMS"] as $key=>$arItem)
				{
					if(
						empty($arItem["VALUES"])
						|| isset($arItem["PRICE"])
					)
						continue;

					if (
						$arItem["DISPLAY_TYPE"] == "A"
						&& (
							$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
						)
					)
						continue;
					?>

                                    <div class="bx-filter-parameters-box filter-accordeon <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>active<?endif?>">
					<span class="bx-filter-container-modef"></span>
                                        <div class="filter-accordeon-label js-filter-accordeon"><?=$arItem["NAME"]?></div>
                                        <div class="filter-accordeon-content" <?if ($arItem["DISPLAY_EXPANDED"]== "Y"){} else{?>style="display:none"<?}?>>
							<?
							$arCur = current($arItem["VALUES"]);
							switch ($arItem["DISPLAY_TYPE"])
							{
								case "A"://NUMBERS_WITH_SLIDER
									?>
									<?
									break;
								case "B"://NUMBERS
									?>
									<?
									break;
								case "G"://CHECKBOXES_WITH_PICTURES
									?>
									<?
									break;
								case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
									?>
									<?
									break;
								case "P"://DROPDOWN
									$checkedItemExist = false;
									?>
									<div class="col-xs-12">
										<div class="bx-filter-select-container">
											<div class="bx-filter-select-block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
												<div class="bx-filter-select-text" data-role="currentOption">
													<?
													foreach ($arItem["VALUES"] as $val => $ar)
													{
														if ($ar["CHECKED"])
														{
															echo $ar["VALUE"];
															$checkedItemExist = true;
														}
													}
													if (!$checkedItemExist)
													{
														echo GetMessage("CT_BCSF_FILTER_ALL");
													}
													?>
												</div>
												<div class="bx-filter-select-arrow"></div>
												<input
													style="display: none"
													type="radio"
													name="<?=$arCur["CONTROL_NAME_ALT"]?>"
													id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
													value=""
												/>
												<?foreach ($arItem["VALUES"] as $val => $ar):?>
													<input
														style="display: none"
														type="radio"
														name="<?=$ar["CONTROL_NAME_ALT"]?>"
														id="<?=$ar["CONTROL_ID"]?>"
														value="<? echo $ar["HTML_VALUE_ALT"] ?>"
														<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
													/>
												<?endforeach?>
												<div class="bx-filter-select-popup" data-role="dropdownContent" style="display: none;">
													<ul>
														<li>
															<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx-filter-param-label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
																<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
															</label>
														</li>
													<?
													foreach ($arItem["VALUES"] as $val => $ar):
														$class = "";
														if ($ar["CHECKED"])
															$class.= " selected";
														if ($ar["DISABLED"])
															$class.= " disabled";
													?>
														<li>
															<label for="<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
														</li>
													<?endforeach?>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<?
									break;
								case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
									?>
									<?
									break;
								case "K"://RADIO_BUTTONS
									?>
									<?
									break;
								case "U"://CALENDAR
									?>
									<?
									break;
								default://CHECKBOXES
									?>
										<?foreach($arItem["VALUES"] as $val => $ar):?>
                                            <div class="pretty js-anim-checkbox p-default p-curve p-fill">
														<input
															type="checkbox"
															value="<? echo $ar["HTML_VALUE"] ?>"
															name="<? echo $ar["CONTROL_NAME"] ?>"
															id="<? echo $ar["CONTROL_ID"] ?>"
															<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
															onclick="smartFilter.click(this)"
														/>
                                                <div class="state">
                                                    <i class="state-deco"></i>
                                                    <label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>"><?=$ar['VALUE']?></label>
                                                </div>
                                            </div>
										<?endforeach;?>
							<?
							}
							?>
                                        </div>
                                    </div>
				<?
				}
				?>

                                    <div class="text-center mb-3">
							<input
								class="btn btn-main btn-hover-accent btn-no-icon"
								type="submit"
								id="set_filter"
								name="set_filter"
								value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
							/>

                                    </div>
                                    <div class="text-center mb-2">
                                        <a href="<?=$arResult['SEF_DEL_FILTER_URL']?>" class="repeat-link">Сбросить фильтр</a>

                                    </div>



					<div class="bx-filter-block bx-filter-buttons-block">
						<div class="bx-filter-parameters-box-container">
							<div class="bx-filter-popup-result right" id="modef" <?if(!isset($arResult["ELEMENT_COUNT"])) echo 'style="display:none"';?> style="display: inline-block;">
								<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
								<span class="arrow"></span>
								<br/>
								<a href="<?echo $arResult["FILTER_URL"]?>" class="btn btn-main btn-hover-accent btn-no-icon" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?></a>
							</div>
						</div>
					</div>



			<div class="clb"></div>
		</form>
                                </div>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>