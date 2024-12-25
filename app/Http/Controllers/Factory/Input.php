<?php

namespace App\Http\Controllers\Factory;

// класс для обработки обязательных полей формы
// в первоначальном виде возвращает значение с проверкой на лишние пробелы (возможны варианты)
// и сообщение об ошибке, если что-то пошло не так

abstract class Input
{
	public $input;
	public $isCorrect = true;
	public $errorMessage = "&#10149; Укажите значение";
	public $param;

	// конструктор кроме значение поля может принимать второй параметр, который по умолчаниию null
	function __construct($val, $param = null){
		$this->input['value'] = trim($val);
		$this->param = $param;

		// проверяем только на пустоту, возможны дополнительные настройки
		if (empty($this->input['value'])){
			$this->input['error'] = $this->errorMessage;
			$this->isCorrect = false;
		} else {
			$this->input['error'] = '';
		}
	}
	public function getValue(){
		return $this->input['value'];
	}
	public function getError(){
		return $this->input['error'];
	}

	// для обнаружение ошибки достаточно проверить на пустоту input['error'], но пусть будет отдельный метод
	public function isCorrect(){
		return $this->isCorrect;
	}
}

?>
