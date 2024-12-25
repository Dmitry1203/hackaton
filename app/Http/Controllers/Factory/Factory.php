<?php

namespace App\Http\Controllers\Factory;

class Factory
{
    public static function create($type, $val, $param = null)
	{
		$class = "App\Http\Controllers\Factory\\".$type;
        if (class_exists($class)) {
            return new $class($val, $param);
        } else {
            throw new \Exception("Class not found");
        }		
    }
}

?>