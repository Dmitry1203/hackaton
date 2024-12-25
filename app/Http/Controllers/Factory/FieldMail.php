<?php
namespace App\Http\Controllers\Factory;
use Illuminate\Support\Facades\DB;

// класс для обработки e-mail полей, дополнительно проверяет формат e-mail
class FieldMail extends Input
{
	function __construct($val, $param){
		parent::__construct($val, $param);

        if (!empty($val) && !filter_var($val, FILTER_VALIDATE_EMAIL)) {
			$this->input['error'] = '&#10149; Укажите правильный формат e-mail';
			$this->isCorrect = false;
		} else {
            $user = DB::select("SELECT email FROM users WHERE email = :email", ['email' => $val]);
            if (count($user) > 0){
                $this->input['error'] = '&#10149; Такой e-mail уже зарегистрирован';
                $this->isCorrect = false;
            }
		}
	}
}
?>
