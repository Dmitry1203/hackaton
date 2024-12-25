<?php

namespace App\Http\Controllers\Factory;

// класс для обработки текстовых полей, дополнительно проверяет проверяет количество символов в поле ввода
// второй параметр, который передавался в класс Input будет определять это количество

class FieldText extends Input{
	public $maxChar;
	function __construct($val, $param){
		parent::__construct($val, $param);

		// максимальное количество символов в поле ввода

		if (!is_null($param)){
            $this->maxChar = $param;
            // переопределим при необходимости сообщение об ошибке
            if (strlen($val) > $this->maxChar){
                $this->input['error'] = "&#10149; В данном поле можно ввести не более  {$this->maxChar} символов";
            }
		}
	}
}
?>
