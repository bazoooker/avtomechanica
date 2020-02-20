<div class=col-lg-12>
<h2><?=$arResult['NAME']?></h2>
<?
	if($arResult["DETAIL_PICTURE"]["SRC"]){
?>
<div class=article-image><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"></div>
<?
	}
?>
<?=$arResult['DETAIL_TEXT']?>

<br>
<br>
<div class=date><?=$arResult['ACTIVE_FROM']?></div>
<br>

<center>
                  <a href=/news/ class="btn btn-outline-dark rounded-pill">Все материалы</a>
</center>

</div>
