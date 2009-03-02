<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function add_zero($inputNumber,$howmany = 1, $beforeAfter = 1)
{
	$zeros = "0";
	if(strlen($inputNumber) == 1)
	{
		$inputNumber = $zeros .$inputNumber;
	}
	return $inputNumber;
}


?>