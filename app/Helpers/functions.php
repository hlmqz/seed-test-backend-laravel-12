<?php

// Function to validate basic UTF-8 string.

if(!function_exists('str_utf8'))
{

	function str_utf8(string $str){
		return
		mb_detect_encoding($str, 'UTF-8', true)
		? $str
		: utf8_encode($str);
	}

}

// Function to prepare string to use expresion regular in query database

if(!function_exists('str_sql_regexp'))
{

	function str_sql_regexp($str){

		$str = str_utf8($str);

		$search = [
			"/[AaÁá]/u",
			"/[EeÉé]/u",
			"/[IiÍí]/u",
			"/[OoÓó]/u",
			"/[UuÚú]/u",
			"/[NnÑñ]/u",
		];
		$replace = [
			'[AaÁá]',
			'[EeÉé]',
			'[IiÍí]',
			'[OoÓó]',
			'[UuÚú]',
			'[NnÑñ]',
		];

		foreach ($replace as $kr => $vr)
			$str = preg_replace($search[$kr] , $vr, $str);

		return $str;
	}
}
