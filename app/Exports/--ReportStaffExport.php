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

class ReportStaffExport implements FromView, WithTitle, WithColumnWidths, WithStyles
{

    public function title(): string
    {
        return 'Отчет об эффективности';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 18,
            'C' => 18,
            'D' => 18,
            'E' => 18,
            'F' => 18,
            'G' => 23,
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

        $staffId = session('staffID');
        $beginPeriod_DDMMYYYY = session('reportBegin');
        $endPeriod_DDMMYYYY = session('reportEnd');

        $beginPeriod = date("Y-m-d", strtotime($beginPeriod_DDMMYYYY));
        $endPeriod = date("Y-m-d", strtotime($endPeriod_DDMMYYYY));

        // сотрудник

        $user = DB::table('users')
            ->select('name', 'surname')
            ->where('company_id', Auth::user()->company_id)
            ->where('user_id', $staffId)
            ->get();

        $staff = $user[0]->name . " " . $user[0]->surname;

        // рабочее время сотрудников
        $works = DB::table('working')
            ->select('date', 'company_id', 'user_id', 'begin_work', 'end_work')
            ->where('company_id', Auth::user()->company_id)
            ->where('user_id', $staffId)
            ->where('date', '>=', $beginPeriod)
            ->where('date', '<=', $endPeriod)
            ->get();

        // всего рабочих часов за период
        $hours = 0;
        foreach ($works as $time) {
            $d1 = strtotime($time->date . ' ' . $time->begin_work);
            $d2 = strtotime($time->date . ' ' . $time->end_work);
            $hours += ($d2 - $d1) / 3600;
        }

        // всего рабочих дней за период
        $days = DB::table('working')
            ->where('company_id', Auth::user()->company_id)
            ->where('user_id', $staffId)
            ->where('date', '>=', $beginPeriod)
            ->where('date', '<=', $endPeriod)
            ->count('id');

        // уникальные услуги специалиста

        $appointmentsUnique = DB::table('appointments')
            ->select(
                'service_id',
            )
            ->where('company_id', Auth::user()->company_id)
            ->where('staff_id', $staffId)
            ->where('appointment_status', 2)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->get()
            ->unique('service_id');

        $servicesName = [];
        foreach ($appointmentsUnique as $appointment) {
            $servicesName[] = Self::getServiceName($appointment->service_id);
            $servicesDuration[] = Self::getAppointmentsDuration($appointment->service_id, $staffId, $beginPeriod, $endPeriod, $hours);
        }

        if (count($servicesName) > 0) {

            $data = [
                'report_begin' => $beginPeriod_DDMMYYYY,
                'report_end' => $endPeriod_DDMMYYYY,
                'staff' => $staff,
                'days' => $days,
                'hours' => $hours,
                'name' => $servicesName,
                'duration' => $servicesDuration,
            ];

        } else {

            $data = [
                'report_begin' => $beginPeriod_DDMMYYYY,
                'report_end' => $endPeriod_DDMMYYYY,
                'staff' => $staff,
                'days' => 0,
                'hours' => 0,
                'name' => [],
                'duration' => [],
            ];

        }

        return view('export.report2', [
            'report' => $data
        ]);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getAppointmentsDuration($serviceId, $staffId, $beginPeriod, $endPeriod, $hours)
    {

        $appointments = DB::table('appointments')
            ->select(
                'staff_id',
                'appointment_date',
                'appointment_time',
                'appointment_status',
                'service_id',
                'rq'
            )
            ->where('company_id', Auth::user()->company_id)
            ->where('staff_id', $staffId)
            ->where('service_id', $serviceId)
            ->where('appointment_status', 2)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->get();

        // длительность
        $appointmentsDuration = 0;
        $summa = 0;
        foreach ($appointments as $appointment) {
            $arr = explode('-', $appointment->appointment_time);
            $appointmentBegin = trim($arr[0]);
            $appointmentEnd = trim($arr[1]);
            $d1 = strtotime($appointment->appointment_date . ' ' . $appointmentBegin);
            $d2 = strtotime($appointment->appointment_date . ' ' . $appointmentEnd);
            $appointmentsDuration += ($d2 - $d1) / 3600;
        }

        // rq //

        $appointmentsRQ = DB::table('appointments')
            ->select(
                'staff_id',
                'appointment_date',
                'appointment_time',
                'appointment_status',
                'service_id',
                'rq'
            )
            ->where('company_id', Auth::user()->company_id)
            ->where('staff_id', $staffId)
            ->where('service_id', $serviceId)
            ->where('appointment_status', 2)
            ->where('rq', 1)
            ->where('appointment_date', '>=', $beginPeriod)
            ->where('appointment_date', '<=', $endPeriod)
            ->get();

        // длительность RQ
        $appointmentsRQDuration = 0;
        $summa = 0;
        foreach ($appointmentsRQ as $appointment) {
            $arr = explode('-', $appointment->appointment_time);
            $appointmentBegin = trim($arr[0]);
            $appointmentEnd = trim($arr[1]);
            $d1 = strtotime($appointment->appointment_date . ' ' . $appointmentBegin);
            $d2 = strtotime($appointment->appointment_date . ' ' . $appointmentEnd);
            $appointmentsRQDuration += ($d2 - $d1) / 3600;
        }

        $data = [
            'duration' => $appointmentsDuration,
            'efficiency' => round(100 * $appointmentsDuration/$hours, 2),
            'duration_rq' => $appointmentsRQDuration,
            'efficiency_rq' => round(100 * $appointmentsRQDuration/$hours, 2),
        ];

        return $data;
    }

    public function getServiceName($serviceId)
    {
        return DB::table('services')->select('name')->find($serviceId);
    }

}
?>
