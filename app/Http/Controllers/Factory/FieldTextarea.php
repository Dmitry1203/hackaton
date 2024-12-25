<?php

namespace App\Http\Controllers\Factory;

// класс для обработки textarea, дополнительных проверок нет
class FieldTextarea extends Input
{
	function __construct($val, $param){
		parent::__construct($val, $param);
	}
}

?>