<?
	setcookie("setview",$_GET['view'],0,"/");
	Header("Location: ".$_SERVER['HTTP_REFERER']);
?>