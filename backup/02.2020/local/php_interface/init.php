<?
function beautify($str) {
	$subsarr=array(
		'/'=>' / ',
		' ,'=>',',
		'.'=>'. ',
		','=>', ',
		'  '=>' '
	);
	//
	foreach($subsarr as $k=>$v) {
			$str=str_replace($k, $v, $str);
	}
	//
	$ex=array('0','1','2','3','4','5','6','7','8','9','0',' ','.');
	for($i=0;$i<strlen($str);$i++) {
		if(in_array($str[$i],$ex)) {
		} else {
			return substr($str,$i);
		}
	}
	return $str;
}


	function pformat($val){
		return number_format($val, 2, '.', ' ');	
	}


COption::SetOptionString("sale", "secure_1c_exchange", "N");
COption::SetOptionString("catalog", "DEFAULT_SKIP_SOURCE_CHECK", "Y"); 
?>