<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Services\ClientService;

class ApiController extends Controller
{

    // имя сотрудника по user_id
    public function staff (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $employee = DB::table('users')->where('user_id', $data['id'])->get();
        if (count($employee) == 1){
            return response()->json([
                'id' => $employee[0]->id,
                'name' => $employee[0]->name,
                'surname' => $employee[0]->surname,
                'position' => $employee[0]->position
            ]);
        }
        return response()->json([
            'status' => 0
        ]);
	}

    // поиск услуг для автозаполнения
    public function services (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $serviceName = $data['serviceName'];
        $services = DB::table('services')
            ->where('name', 'like', '%'.$serviceName.'%')
            ->get();

        if (count($services) >= 1){
            return response()->json($services);
        }

        return response()->json([
            'status' => 0
        ]);
    }

    // поиск клиента для автозаполнения
    public function clients (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data['type'] === 'surname'){
            $clients = DB::table('clients')
                ->where('company_id', Auth::user()->company_id)
                ->where('surname', 'like', '%'.$data['value'].'%')
                ->get();
        } elseif ($data['type'] === 'phone'){
            $clients = DB::table('clients')
                ->where('company_id', Auth::user()->company_id)
                ->where('phone', $data['value'])
                ->get();
        } else {
            return response()->json(['status' => 0]);
        }

        if (count($clients) >= 1){
            return response()->json($clients);
        }
        return response()->json(['status' => 0]);
    }

    // информация о записи
    public function appointment (Request $request)
    {

        $data = json_decode(file_get_contents("php://input"), true);
        $appointment = DB::table('appointments')
            ->join('clients', 'clients.client_id', '=', 'appointments.client_id')
            ->join('users', 'users.user_id', '=', 'appointments.staff_id')
            ->select(
                'appointments.id',
                'appointments.staff_id',
                'appointments.appointment_date',
                'appointments.appointment_time',
                'appointments.appointment_name',
                'appointments.appointment_price',
                'appointments.appointment_status',
                'appointments.appointment_visit',
                'clients.client_id as clientID',
                'clients.name as clientName',
                'clients.surname as clientSurname',
                'clients.phone as clientPhone',
                DB::raw('DATE_FORMAT(clients.created_at, "%d.%m.%Y %H:%i") as clientCreated'),
                'clients.created_by_id as clientCreatedBy',
                'users.surname as employeeSurname',
                'users.name as employeeName',
                'users.position as employeePosition'
            )
            ->where('appointments.id', $data['id'])
            ->get();

        if (count($appointment) == 1){

            // основной комментарий
            $comment = '';
            $mainComment = DB::table('clients_comments')
                ->where('client_id', $appointment[0]->clientID)
                ->where('main', 1)
                ->get();

            if (count($mainComment) == 1){
                $comment = $mainComment[0]->comment;
            }

            $createdBy = DB::table('users')
                ->select(
                    'name',
                    'surname'
                )
                ->where('user_id', $appointment[0]->clientCreatedBy)
                ->get();

            return response()->json([
                'appointmentID' => $appointment[0]->id,
                'appointmentName' => $appointment[0]->appointment_name,
                'appointmentDate' => $appointment[0]->appointment_date,
                'appointmentTime' => $appointment[0]->appointment_time,
                'appointmentPrice' => $appointment[0]->appointment_price,
                'appointmentStatus' => $appointment[0]->appointment_status,
                'clientID' => $appointment[0]->clientID,
                'clientName' => $appointment[0]->clientName,
                'clientSurname' => $appointment[0]->clientSurname,
                'clientPhone' => $appointment[0]->clientPhone,
                'clientComment' => $comment,
                'clientVisit' => $appointment[0]->appointment_visit,
                'employeeName' => $appointment[0]->employeeName,
                'employeeSurname' => $appointment[0]->employeeSurname,
                'employeePosition' => $appointment[0]->employeePosition,
                'createdBy' => 'Добавил '.$createdBy[0]->surname.' '.$createdBy[0]->name.', '.$appointment[0]->clientCreated,
            ]);
        }
        return response()->json([
            'status' => 0
        ]);

    }

    // добавить запись
    public function appointmentStore (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $surname = trim($data['surname']);
        $name = trim($data['name']);
        $phone = $data['phone'];
        $appointmentDate = $data['appointmentDate'];
        $appointmentStart = $data['appointmentStart'];
        $employeeID = $data['employeeID'];
        $service = $data['service'];
        $price = $data['price'];
        $duration = $data['duration'];
        $comment = "";

        if (!empty($surname) && !empty($name) && !empty($phone) && !empty($service) && !empty($employeeID)){

            // есть ли такой клиент
            $clients = DB::table('clients')
                ->select('client_id')
                ->where('company_id', Auth::user()->company_id)
                ->where('surname', $surname)
                ->where('phone', $phone)
                ->where('name', $name)
                ->get();

            if (count($clients) == 0){
                // добавить клиента
                $clientID = ClientService::createClient($request);
            } else {
                $clientID = $clients[0]->client_id;
            }

            // добавить запись на процедуру
            if ($clientID){

                // основной комментарий, чтобы передать в ответе
                $mainComment = '';
                $comment = DB::table('clients_comments')
                    ->select('comment')
                    ->where('client_id', $clientID)
                    ->where('main', 1)
                    ->get();
                if (count($comment) == 1){
                    $mainComment = $comment[0]->comment;
                }

                // время процедуры
                $appointmentEnd = strtotime($appointmentStart) + 60 * $duration;
                $appointmentTime = $appointmentStart ." - ".strftime('%H:%M', $appointmentEnd);

                $data = [
                    'company_id' => Auth::user()->company_id,
                    'staff_id' => $employeeID,
                    'client_id' => $clientID,
                    'appointment_date' => $appointmentDate,
                    'appointment_time' => $appointmentTime,
                    'appointment_name' => $service,
                    'appointment_price' => $price,
                    'appointment_status' => 1,
                    'appointment_visit' => ''
                ];

                try {
                    $appointmentID = DB::table('appointments')->insertGetId($data);

                    // ответ

                    $response = [
                        'appointmentID' => $appointmentID,
                        'employeeID' => $employeeID,
                        'appointmentTime' => $appointmentTime,
                        'appointmentProcedure' => $service,
                        'appointmentPrice' => $price,
                        'client' => $name." ".$surname,
                        'phone' => $phone,
                        'comment' => $mainComment
                    ];
                    return response()->json($response);

                } catch (\Exception $e) {
                    return response()->json(['status' => 0]);
                }

            } else {
                return response()->json(['status' => 0]);
            }

        }

    }

    // поменять статус записи на КЛИЕНТ ПРИШЕЛ
    public function clientIsCome (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'];
        $visit = $data['visit'];
        if ($id>0){
            DB::table('appointments')
                 ->where('id', $id)
                 ->where('company_id', Auth::user()->company_id)
                 ->update([
                     'appointment_status' => 3,
                     'appointment_visit' => $visit
                 ]);

            return response()->json([
                'success' => 1
            ]);
        }
        return response()->json([
            'success' => 0
        ]);
    }


    // удалить запись о посещении
    public function removeAppointment (Request $request)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if ($data['appointmentID'] > 0) {
            try {
                DB::table('appointments')
                     ->where('id', $data['appointmentID'])
                     ->where('company_id', Auth::user()->company_id)
                     ->delete();
                return response()->json(['success' => 1]);
            } catch (\Exception $e) {
                return response()->json(['success' => 0]);
            }
        } else {
            return response()->json(['success' => 0]);
        }
    }
}
