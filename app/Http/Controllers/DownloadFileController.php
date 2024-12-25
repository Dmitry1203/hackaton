<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{

    function download($file_name){
        $file = Storage::disk('public')->get('docs/'.$file_name);
        return response($file, 200)->header('Content-Type', 'application/pdf');
    }


}
