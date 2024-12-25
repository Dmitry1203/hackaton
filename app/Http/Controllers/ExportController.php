<?php
// https://docs.laravel-excel.com/3.1/exports/from-view.html
// framework/cache/laravel-excel доступ 777

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
//use App\Exports\ReportExport; // отчет
use App\Exports\MultipleSheets; // многостраничный вариант

class ExportController extends Controller
{
    public function export(Request $request)
    {

    }
}

?>
