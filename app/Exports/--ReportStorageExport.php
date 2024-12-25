<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportStorageExport implements FromView, WithTitle, WithColumnWidths, WithStyles
{

    public function title(): string
    {
        return 'Отчет по складу';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 28,
            'B' => 28,
            'C' => 20,
            'D' => 20,
            'E' => 28,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['size' => 18]],
        ];
    }

    public function view(): View
    {

        $beginPeriod_DDMMYYYY = session('reportBegin');
        $endPeriod_DDMMYYYY = session('reportEnd');

        $beginPeriod = date("Y-m-d", strtotime($beginPeriod_DDMMYYYY));
        $endPeriod = date("Y-m-d", strtotime($endPeriod_DDMMYYYY));

        $products = DB::table('products')
            ->select(
                'id',
                'name',
                'unit',
            )
            ->where('company_id', Auth::user()->company_id)
            ->orderBy('name', 'desc')
            ->get();

        $productsCountBegin = [];
        $productsPurchase = [];
        $productsWriteoff = [];
        $productsCountEnd = [];

        foreach ($products as $product) {
            //$productsBegin = Self::getPurchaseBeginCount($product->id, $beginPeriod) - Self::getWriteoffBeginCount($product->id, $beginPeriod) + Self::getInventoryBeginCount($product->id, $beginPeriod);

            $productsBegin = Self::getPurchaseBeginCount($product->id, $beginPeriod) - Self::getWriteoffBeginCount($product->id, $beginPeriod);
            $productsCountBegin[] = $productsBegin;
            $valuePurchase = Self::getPurchaseCount($product->id, $beginPeriod, $endPeriod);
            $valueWriteoff = Self::getWriteoffCount($product->id, $beginPeriod, $endPeriod);
            $productsPurchase[] = $valuePurchase;
            $productsWriteoff[] = $valueWriteoff;
            $productsCountEnd[] = $productsBegin + $valuePurchase - $valueWriteoff;

        }

        $data = [
            'report_begin' => $beginPeriod_DDMMYYYY,
            'report_end' => $endPeriod_DDMMYYYY,
            'products' => $products,
            'begin' => $productsCountBegin,
            'purchases' => $productsPurchase,
            'writeoff' => $productsWriteoff,
            'end' => $productsCountEnd,
        ];

        return view('export.report4', [
            'report' => $data
        ]);

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getPurchaseBeginCount($productId, $beginPeriod)
    {
        $value = DB::table('purchase_detail')
            ->join('purchases', 'purchases.purchase_id', '=', 'purchase_detail.purchase_id')
            ->select('purchase_detail.product_count')
            ->where('purchase_detail.product_id', $productId)
            ->whereDate('purchases.created_at', '<', $beginPeriod)
            ->sum('purchase_detail.product_count');
        return (int)$value;
    }

    public function getWriteoffBeginCount($productId, $beginPeriod)
    {
        $value = DB::table('writeoff_detail')
            ->join('writeoff', 'writeoff.writeoff_id', '=', 'writeoff_detail.writeoff_id')
            ->select('writeoff_detail.product_count')
            ->where('writeoff_detail.product_id', $productId)
            ->whereDate('writeoff.created_at', '<', $beginPeriod)
            ->sum('writeoff_detail.product_count');
        return (int)$value;
    }

    public function getInventoryBeginCount($productId, $beginPeriod)
    {
        $inventory = DB::table('inventory_detail')
            ->join('inventory', 'inventory.inventory_id', '=', 'inventory_detail.inventory_id')
            ->select(
                'inventory_detail.rest',
                'inventory_detail.fact',
            )
            ->where('inventory_detail.product_id', $productId)
            ->whereDate('inventory.created_at', '<', $beginPeriod)
            ->get();
        $inventoryCount = 0;
        foreach ($inventory as $value) {
            $inventoryCount += $value->rest - $value->fact;
        }
        return (int)$inventoryCount;
    }

    public function getPurchaseCount($productId, $beginPeriod, $endPeriod)
    {
        $value = DB::table('purchase_detail')
            ->join('purchases', 'purchases.purchase_id', '=', 'purchase_detail.purchase_id')
            ->select('purchase_detail.product_count')
            ->where('purchase_detail.product_id', $productId)
            ->whereDate('purchases.created_at', '>=', $beginPeriod)
            ->whereDate('purchases.created_at', '<=', $endPeriod)
            ->sum('purchase_detail.product_count');
        return (int)$value;
    }

    public function getWriteoffCount($productId, $beginPeriod, $endPeriod)
    {
        $value = DB::table('writeoff_detail')
            ->join('writeoff', 'writeoff.writeoff_id', '=', 'writeoff_detail.writeoff_id')
            ->select('writeoff_detail.product_count')
            ->where('writeoff_detail.product_id', $productId)
            ->whereDate('writeoff.created_at', '>=', $beginPeriod)
            ->whereDate('writeoff.created_at', '<=', $endPeriod)
            ->sum('writeoff_detail.product_count');
        return (int)$value;
    }
}
?>
