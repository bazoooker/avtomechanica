<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/props_format.php");
global $USER;
?>
<?
?>
<div class="customer_info">
<?
	if(!$USER->IsAuthorized()&&$arResult['USER_VALS']['PERSON_TYPE_ID']==2) {
?>
<!-- div class=clear></div>
<div class=customernote>Если вы уже зарегистрированы у нас, <a href="javascript:" onClick="$('#orderauth').toggle();">авторизуйтесь</a>.</div -->
<?
	}
?>
<?
	if(!$USER->IsAuthorized()&&$arResult['USER_VALS']['PERSON_TYPE_ID']==1) {
?>
<!-- div class=clear></div>
<div class=customernote>
Если Вы новый пользователь, то для заказа через интернет-магазин обратитесь к Вашему личному менеджеру. Юридические лица на сайте покупают по оптовым ценам.
Уже зарегистрированы как юридическое лицо? <a href="javascript:" onClick="$('#orderauth').toggle();">Авторизуйтесь</a>
</div -->
<?
	}
?>

    <div class="section">
    	<?
    	$bHideProps = false;
    	if (!empty($arResult["ORDER_PROP"]["USER_PROFILES"])):
    		if ($arParams["ALLOW_NEW_PROFILE"] == "Y"):
    	?>
    		<div class="bx_block r1x3 pt8">
    			<?=GetMessage("SOA_TEMPL_PROP_CHOOSE")?>
    		</div>
    		<div class="bx_block r3x1">
    			<select name="PROFILE_ID" id="ID_PROFILE_ID" onChange="SetContact(this.value)">
    				<option value="0"><?=GetMessage("SOA_TEMPL_PROP_NEW_PROFILE")?></option>
    				<?
    				foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
    				{
    					if ($arUserProfiles["CHECKED"]=="Y")
    						$bHideProps = true;
    					?>
    					<option value="<?= $arUserProfiles["ID"] ?>"<?if ($arUserProfiles["CHECKED"]=="Y") echo " selected";?>><?=$arUserProfiles["NAME"]?></option>
    					<?
    				}
    				?>
    			</select>
    		</div>
    		<?
    		else:
    		?>
    		<div class="bx_block r1x3 profile_list">
    			<?=GetMessage("SOA_TEMPL_EXISTING_PROFILE")?>
    		</div>
    		<div class="bx_block r3x1 profile_list">
    				<?
    				if (count($arResult["ORDER_PROP"]["USER_PROFILES"]) == 1)
    				{
    					foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
    					{
    						echo "<strong>".$arUserProfiles["NAME"]."</strong>";
    						?>
    						<input type="hidden" name="PROFILE_ID" id="ID_PROFILE_ID" value="<?=$arUserProfiles["ID"]?>" />
    						<?
    					}
    				}
    				else
    				{
    					?>
    					<select name="PROFILE_ID" id="ID_PROFILE_ID" onChange="SetContact(this.value)">
    						<?
    						foreach($arResult["ORDER_PROP"]["USER_PROFILES"] as $arUserProfiles)
    						{
    							if ($arUserProfiles["CHECKED"]=="Y")
    								$bHideProps = true;
    							?>
    							<option value="<?= $arUserProfiles["ID"] ?>"<?if ($arUserProfiles["CHECKED"]=="Y") echo " selected";?>><?=$arUserProfiles["NAME"]?></option>
    							<?
    						}
    						?>
    					</select>
    					<?
    				}
    				?>
    		</div>
    	<?
    		endif;
    	endif;
    	?>
        <div style="clear: both;"></div>
    </div>
    <div class="bx_section">
    	
    
    	<div id="sale_order_props">
    		<?
    		PrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_Y"], $arParams["TEMPLATE_LOCATION"]);
    		PrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_N"], $arParams["TEMPLATE_LOCATION"]);
    		?>
    	</div>
        <div style="clear:  both;"></div>
    </div>
</div>

<script type="text/javascript">
	function fGetBuyerProps(el)
	{
		var show = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW')?>';
		var hide = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE')?>';
		var status = BX('sale_order_props').style.display;
		var startVal = 0;
		var startHeight = 0;
		var endVal = 0;
		var endHeight = 0;
		var pFormCont = BX('sale_order_props');
		pFormCont.style.display = "block";
		pFormCont.style.overflow = "hidden";
		pFormCont.style.height = 0;
		var display = "";

		if (status == 'none')
		{
			el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE');?>';

			startVal = 0;
			startHeight = 0;
			endVal = 100;
			endHeight = pFormCont.scrollHeight;
			display = 'block';
			BX('showProps').value = "Y";
			el.innerHTML = hide;
		}
		else
		{
			el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW');?>';

			startVal = 100;
			startHeight = pFormCont.scrollHeight;
			endVal = 0;
			endHeight = 0;
			display = 'none';
			BX('showProps').value = "N";
			pFormCont.style.height = startHeight+'px';
			el.innerHTML = show;
		}

		(new BX.easing({
			duration : 700,
			start : { opacity : startVal, height : startHeight},
			finish : { opacity: endVal, height : endHeight},
			transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
			step : function(state){
				pFormCont.style.height = state.height + "px";
				pFormCont.style.opacity = state.opacity / 100;
			},
			complete : function(){
					BX('sale_order_props').style.display = display;
					BX('sale_order_props').style.height = '';
			}
		})).animate();
	}
</script>

<div style="display:none;">
<?
	$APPLICATION->IncludeComponent(
		"bitrix:sale.ajax.locations",
		$arParams["TEMPLATE_LOCATION"],
		array(
			"AJAX_CALL" => "N",
			"COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
			"REGION_INPUT_NAME" => "REGION_tmp",
			"CITY_INPUT_NAME" => "tmp",
			"CITY_OUT_LOCATION" => "Y",
			"LOCATION_VALUE" => "",
			"ONCITYCHANGE" => "submitForm()",
		),
		null,
		array('HIDE_ICONS' => 'Y')
	);
?>
</div>