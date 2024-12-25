<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportExport implements FromView, WithTitle, WithColumnWidths, WithStyles, WithColumnFormatting
{

    public function title(): string
    {
        return 'Финансово-кассовый отчет';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 22,
            'B' => 20,
            'C' => 15,
            'D' => 24,
            'E' => 15,
            'F' => 22,
            'G' => 20,
            'H' => 15,
            'I' => 24,
        ];
    }

    // https://docs.laravel-excel.com/2.1/reference-guide/formatting.html

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['size' => 18]],
            12   => ['font' => ['size' => 18]],
            25   => ['font' => ['size' => 18]],
            27   => ['font' => ['size' => 18]],
            'A9:B9' => ['font' => ['bold' => true]],
            'A10:B10' => ['font' => ['bold' => true]],
            // Styling an entire column.
            /*
            'C'  => ['font' => ['size' => 16]],
            */
        ];
    }

    // https://docs.laravel-excel.com/2.1/reference-guide/formatting.html
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'D29:D33' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'B9' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function view(): View
    {

        // на начало дня
        // внесено
        //$reportDate = date("Y-m-d");

        //$reportDate = session('reportDate');
        //$reportDateDDMMYYYY = date("d.m.Y", strtotime($reportDate));

        $reportDate = '2022-04-26';
        $reportDateDDMMYYYY = date("d.m.Y", strtotime($reportDate));

        ///

        $beginPeriod = '2022-05-01';
        $endPeriod = '2022-05-30';

        $beginLastPeriod = '2022-04-01';
        $endLastPeriod = '2022-04-30';

        $beginPeriod_DDMMYYYY = '01.05.2022';
        $endPeriod_DDMMYYYY = '30.05.2022';

        ///

        $depositStartCash = self::getPaymentTodayValue(1, 1, $beginPeriod);
        $depositStartAccount = self::getPaymentTodayValue(1, 2, $beginPeriod);
        $depositStartCashless = self::getPaymentTodayValue(1, 3, $beginPeriod);
        $depositStartSite = self::getPaymentTodayValue(1, 4, $beginPeriod);
        $depositStart = $depositStartCash + $depositStartAccount + $depositStartCashless + $depositStartSite;
        // снято
        $withdrawStartCash = self::getPaymentTodayValue(2, 1, $beginPeriod);
        $withdrawStartAccount = self::getPaymentTodayValue(2, 2, $beginPeriod);
        $withdrawStartCashless = self::getPaymentTodayValue(2, 3, $beginPeriod);
        $withdrawStartSite = self::getPaymentTodayValue(2, 4, $beginPeriod);
        $withdrawStart = $withdrawStartCash + $withdrawStartAccount + $withdrawStartCashless + $withdrawStartSite;
        // в кассе на начало дня
        $inCashStart = $depositStart - $withdrawStart;

        // внесено за отчётный период (доход)
        $depositTodayCash = self::getPaymentValue(1, 1, $beginPeriod, $endPeriod);
        $depositTodayAccount = self::getPaymentValue(1, 2,  $beginPeriod, $endPeriod);
        $depositTodayCashless = self::getPaymentValue(1, 3,  $beginPeriod, $endPeriod);
        $depositTodaySite = self::getPaymentValue(1, 4, $beginPeriod, $endPeriod);
        $depositToday = $depositTodayCash + $depositTodayAccount + $depositTodayCashless + $depositTodaySite;

        // внесено за услуги за отчётный период (доход)
        $depositTodayService = self::getPaymentValue(1, 1, $beginPeriod, $endPeriod, 1);
        // внесено за продажи за отчётный период (доход)
        $depositTodaySelling = self::getPaymentValue(1, 1, $beginPeriod, $endPeriod, 2);
        // внесено за сертификаты за отчётный период (доход)
        $depositTodayCertificate = self::getPaymentValue(1, 1,  $beginPeriod, $endPeriod, 3);
        // внесено за абонементы за отчётный период (доход)
        $depositTodaySubscription = self::getPaymentValue(1, 1, $beginPeriod, $endPeriod,  4);
        // внесено на депозит за отчётный период (доход)
        $depositTodayDeposit = self::getPaymentValue(1, 1, $beginPeriod, $endPeriod,  5);

        // расходы за отчётный период
        $withdrawTodayCash = self::getPaymentValue(2, 1,  $beginPeriod, $endPeriod);
        $withdrawTodayAccount = self::getPaymentValue(2, 2,  $beginPeriod, $endPeriod);
        $withdrawTodayCashless = self::getPaymentValue(2, 3,  $beginPeriod, $endPeriod);
        $withdrawTodaySite = self::getPaymentValue(2, 4,  $beginPeriod, $endPeriod);
        $withdrawToday = $withdrawTodayCash + $withdrawTodayAccount + $withdrawTodayCashless + $withdrawTodaySite;

        // по типам

        // withdraw_type
        // 1 косв расходы
        // 2 вывод прибыли
        // 3 материалы

        $withdrawTodayIndirect = self::getWithdrawTypeValue(1, $beginPeriod, $endPeriod);
        $withdrawTodayProfit = self::getWithdrawTypeValue(2, $beginPeriod, $endPeriod);
        $withdrawTodayMaterials = self::getWithdrawTypeValue(3, $beginPeriod, $endPeriod);

        // количество уникальных клиентов за отчётный период
        $uniqueClients = DB::table('appointments')
            ->select('id')
            ->where('company_id', Auth::user()->company_id)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->where('appointment_status', 2)
            ->distinct()
            ->count('client_id');

        // количество оплаченных посещений за отчётный период
        $appointments = DB::table('appointments')
            ->select('id')
            ->where('company_id', Auth::user()->company_id)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->where('appointment_status', 2)
            ->count();

        // сумма оплаченных посещений за отчётный период
        $visits = DB::table('appointments')
            ->select('appointment_price', 'appointment_discount')
            ->where('company_id', Auth::user()->company_id)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->where('appointment_status', 2)
            ->get();
        $summaVisits = 0;
        foreach ($visits as $visit) {
            $summaVisits += round($visit->appointment_price - ($visit->appointment_price * $visit->appointment_discount)/100);
        }

        // средний чек
        if (!empty($appointments)){
            $averageCheck = round($summaVisits / $appointments);
        } else {
            $averageCheck = 0;
        }

        // доходы по способам оплаты за прошлый период

        //$date = new \DateTime( $reportDate );
        //$Last = $date->modify("-1 day")->format('Y-m-d');

        $depositLastCash = self::getPaymentValue(1, 1,  $beginLastPeriod, $endLastPeriod);
        $depositLastAccount = self::getPaymentValue(1, 2, $beginLastPeriod, $endLastPeriod);
        $depositLastCashless = self::getPaymentValue(1, 3, $beginLastPeriod, $endLastPeriod);
        $depositLastSite = self::getPaymentValue(1, 4, $beginLastPeriod, $endLastPeriod);

        // расходы по способам оплаты за прошлый период

        $withdrawLastCash = self::getPaymentValue(2, 1, $beginLastPeriod, $endLastPeriod);
        $withdrawLastAccount = self::getPaymentValue(2, 2, $beginLastPeriod, $endLastPeriod);
        $withdrawLastCashless = self::getPaymentValue(2, 3, $beginLastPeriod, $endLastPeriod);
        $withdrawLastSite = self::getPaymentValue(2, 4, $beginLastPeriod, $endLastPeriod);

        // по типам
        // withdraw_type
        // 1 косв расходы
        // 2 вывод прибыли
        // 3 материалы

        $withdrawLastIndirect = self::getWithdrawTypeValue(1, $beginLastPeriod, $endLastPeriod);
        $withdrawLastProfit = self::getWithdrawTypeValue(2, $beginLastPeriod, $endLastPeriod);
        $withdrawLastMaterials = self::getWithdrawTypeValue(3, $beginLastPeriod, $endLastPeriod);

        // внесено за услуги за прошлый период
        $depositLastService = self::getPaymentValue(1, 1, $beginLastPeriod, $endLastPeriod, 1);
        // внесено за продажи за прошлый период
        $depositLastSelling = self::getPaymentValue(1, 1, $beginLastPeriod, $endLastPeriod, 2);
        // внесено за сертификаты за прошлый период
        $depositLastCertificate = self::getPaymentValue(1, 1, $beginLastPeriod, $endLastPeriod, 3);
        // внесено за абонементы за прошлый период
        $depositLastSubscription = self::getPaymentValue(1, 1, $beginLastPeriod, $endLastPeriod, 4);
        // внесено на депозит за прошлый период
        $depositLastDeposit = self::getPaymentValue(1, 1, $beginLastPeriod, $endLastPeriod, 5);

        $data = [
            'begin_period' => $beginPeriod_DDMMYYYY,
            'end_period' => $endPeriod_DDMMYYYY,

            'in_cash_start_cash' => $depositStartCash - $withdrawStartCash,
            'in_cash_start_account' => $depositStartAccount - $withdrawStartAccount,
            'in_cash_start_cashless' => $depositStartCashless - $withdrawStartCashless,
            'in_cash_start_site' => $depositStartSite - $withdrawStartSite,
            'in_cash_start_all' => $depositStart - $withdrawStart,

            'deposit_cash' => (int)$depositTodayCash,
            'deposit_account' => (int)$depositTodayAccount,
            'deposit_cashless' => (int)$depositTodayCashless,
            'deposit_site' => (int)$depositTodaySite,
            'deposit_all' => (int)$depositToday,

            'deposit_service' => (int)$depositTodayService,
            'deposit_selling' => (int)$depositTodaySelling,
            'deposit_certificate' => (int)$depositTodayCertificate,
            'deposit_subscription' => (int)$depositTodaySubscription,
            'deposit_deposit' => (int)$depositTodayDeposit,

            'withdraw_cash' => (int)$withdrawTodayCash,
            'withdraw_account' => (int)$withdrawTodayAccount,
            'withdraw_cashless' => (int)$withdrawTodayCashless,
            'withdraw_site' => (int)$withdrawTodaySite,
            'withdraw_all' => (int)$withdrawToday,

                'withdraw_indirect' => (int)$withdrawTodayIndirect,
                'withdraw_profit' => (int)$withdrawTodayProfit,
                'withdraw_materials' => (int)$withdrawTodayMaterials,

            'unique_clients' => $uniqueClients,
            'appointments' => $appointments,
            'summa_visits' => $summaVisits,
            'average_check' => $averageCheck,

            'deposit_last_cash' => (int)$depositLastCash,
            'deposit_last_account' => (int)$depositLastAccount,
            'deposit_last_cashless' => (int)$depositLastCashless,
            'deposit_last_site' => (int)$depositLastSite,

            'withdraw_last_cash' => (int)$withdrawLastCash,
            'withdraw_last_account' => (int)$withdrawLastAccount,
            'withdraw_last_cashless' => (int)$withdrawLastCashless,
            'withdraw_last_site' => (int)$withdrawLastSite,

                'withdraw_last_indirect' => (int)$withdrawLastIndirect,
                'withdraw_last_profit' => (int)$withdrawLastProfit,
                'withdraw_last_materials' => (int)$withdrawLastMaterials,

            'deposit_last_service' => (int)$depositLastService,
            'deposit_last_selling' => (int)$depositLastSelling,
            'deposit_last_certificate' => (int)$depositLastCertificate,
            'deposit_last_subscription' => (int)$depositLastSubscription,
            'deposit_last_deposit' => (int)$depositLastDeposit,

        ];

        return view('export.report1', [
            'report' => $data,
        ]);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getPaymentValue($operationType, $operationPayType, $dateBegin, $dateEnd, $operationDetail = 0)
    {

        if ($operationDetail > 0){
            // детализация по платежам (услуга, серт, абонемент, депозит)
            // нал, б/н и пр. не важно
            $value = DB::table('cash')
                ->select('summa')
                ->where('company_id', Auth::user()->company_id)
                ->where('operation_detail', $operationDetail)
                ->whereDate('operation_date', '>=', $dateBegin)
                ->whereDate('operation_date', '<=', $dateEnd)
                ->sum('summa');

        } else {

            $value = DB::table('cash')
                ->select('summa')
                ->where('company_id', Auth::user()->company_id)
                ->where('operation_type', $operationType)
                ->where('operation_pay_type', $operationPayType)
                ->whereDate('operation_date', '>=', $dateBegin)
                ->whereDate('operation_date', '<=', $dateEnd)
                ->sum('summa');
        }

        return $value;
    }

    public function getPaymentTodayValue($operationType, $operationPayType, $date)
    {
        $value = DB::table('cash')
            ->select('summa')
            ->where('company_id', Auth::user()->company_id)
            ->where('operation_type', $operationType)
            ->where('operation_pay_type', $operationPayType)
            ->whereDate('operation_date', '<', $date)
            ->sum('summa');
        return $value;
    }

    // типы снятия
    public function getWithdrawTypeValue($withdrawType, $dateBegin, $dateEnd)
    {
        $value = DB::table('cash')
            ->select('summa')
            ->where('company_id', Auth::user()->company_id)
            ->where('operation_type', 2)
            ->where('withdraw_type', $withdrawType)
            ->whereDate('operation_date', '>=', $dateBegin)
            ->whereDate('operation_date', '<=', $dateEnd)
            ->sum('summa');
        return $value;
    }


}

*/

?>
