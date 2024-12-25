<?php
namespace App\Http\Controllers\Classes;
class Scripts
{
    public static function create($route, $scripts)
    {
        foreach($scripts as $key => $files) {
            if ($route === $key){
                foreach($files as $file) {
                    if (stripos($file, 'http') !== false){
                        echo "<script src='{$file}'></script>";
                    } else {
                        echo "<script src='/js/admin/{$file}'></script>";
                    }
                }
            }
        }
    }
}
