<?php
//取得IP函数
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
//字符截取函数
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') 
{ 
if($code == 'UTF-8') 
{ 
$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; 
preg_match_all($pa, $string, $t_string); 
if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)).".."; 
return join('', array_slice($t_string[0], $start, $sublen)); 
} 
else 
{ 
$start = $start*2; 
$sublen = $sublen*2; 
$strlen = strlen($string); 
$tmpstr = ''; 
for($i=0; $i< $strlen; $i++) 
{ 
if($i>=$start && $i< ($start+$sublen)) 
{ 
if(ord(substr($string, $i, 1))>129) 
{ 
$tmpstr.= substr($string, $i, 2); 
} 
else 
{ 
$tmpstr.= substr($string, $i, 1); 
} 
} 
if(ord(substr($string, $i, 1))>129) $i++; 
} 
if(strlen($tmpstr)< $strlen ) $tmpstr.= ".........."; 
return $tmpstr; 
} 
} 
?>