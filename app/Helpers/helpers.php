<?php
// уникальный 10-значный ID
if (!function_exists('_helper_createID')) {
	function _helper_createID()
	{
		/*
	   $length = 9;
        $possible='123456789';
        $value = "";
        while (strlen($value)<$length){
             $value.=substr($possible, mt_rand(0, strlen($possible)-1), 1);
        }
        return time() + $value;
        */

		return mt_rand(1000000000, 4000000000);


	}
}

if (!function_exists('_date_MM_DD_YYYY')) {
	function _date_MM_DD_YYYY($date)
	{
        return date("d.m.Y H:i", strtotime($date));
	}
}

if (!function_exists('_date_YYYY_MM_DD')) {
	function _date_YYYY_MM_DD($date)
	{
        return date("Y-m-d", strtotime($date));
	}
}

if (!function_exists('_helper_replace_br')) {
	function _helper_replace_br($str)
	{
        return str_replace('<br />', '', $str);
	}
}

if (!function_exists('_event')) {
	function _event()
	{

		$local = 1842366705;
		$prod = 3843287867;
     	return $prod;
	}
}
?>
