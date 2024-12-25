<?php
namespace App\Http\Controllers\Organizer;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Notification;
use App\Models\Event;
use App\Models\Stage;
use App\Models\Task;
use App\Models\Criterion;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// сервисный слой
use App\Http\Controllers\Services\Service;

class OrganizerController extends Controller
{
    // главная
    public function index ()
    {
        try {

            $event = Event::select('*',
            DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y") as format_created_at')
            )
            ->first();

            $stages = Stage::select('*',
                DB::raw('DATE_FORMAT(stage_date_end, "%d.%m.%Y") as stage_date_end'),
                DB::raw('DATE_FORMAT(stage_date_end, "%H:%i") as stage_time_end')
            )
            ->where('event_id', $event->event_id)
            ->orderBy('id')
            ->get();

            $logos = Logo::where('event_id', $event->event_id)->get();
            $tasks = Task::where('event_id', $event->event_id)->get();
            $criteria = Criterion::where('event_id', $event->event_id)->get();

            return view('organizer.index', compact('event', 'stages', 'logos', 'tasks', 'criteria'));

        } catch (\Exception $e) {
            return view('site.error');
        }
	}


    // список участников
    public function usersList ()
    {

        //$today = date("Y-m-d H:i:s");
        //dd($today);

        /*
        $users = User::where('is_sponsor', 0)
            ->where('id', '>', 45)
            ->orderBy('id', 'desc')
            ->get();
        */

        $users = User::leftJoin('teams', 'teams.id', '=', 'users.team_id')
            ->where('users.id', '>', 45)
            ->orderBy('users.id', 'desc')
            ->get(['users.*', 'teams.team as TeamName']);

        return view('organizer.users', compact('users'));
    }

    public function usersList2 ()
    {

        $users = User::leftJoin('teams', 'teams.id', '=', 'users.team_id')
            ->where('users.id', '>', 45)
            ->orderBy('users.team_id', 'desc')
            ->get(['users.*', 'teams.team as TeamName']);

        return view('organizer.users2', compact('users'));
    }

    // создать мероприятие
    public function eventCreate ()
    {
        return view('organizer.eventCreate');
    }


    // редактировать мероприятие
    public function eventEdit ($eventId)
    {
        try {
            $event = Event::select('*',
                DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y") as format_created_at')
            )
            ->first();
            //$logo = Logo::where('event_id', $event->event_id)->get();
            return view('organizer.eventEdit', compact('eventId', 'event'));
        } catch (\Exception $e) {
            return view('site.error');
        }
    }


    // обновить мероприятие
    public function eventUpdate (Request $request, $eventId)
    {

        try {
            if ($request->hasFile('organizer_logo')){

                $logo = Service::uploadLogo($request->file('organizer_logo'), $eventId, 1);
                $data = [
                    'event_name' => trim($request->input('event_name')),
                    'event_text' => trim($request->input('event_text')),
                    'organizer_name' => trim($request->input('organizer_name')),
                    'organizer_text' => trim($request->input('organizer_text')),
                    'logo' => $logo
                ];
            } else {

                $data = [
                    'event_name' => trim($request->input('event_name')),
                    'event_text' => trim($request->input('event_text')),
                    'organizer_name' => trim($request->input('organizer_name')),
                    'organizer_text' => trim($request->input('organizer_text')),
                ];
            }

            Event::where('event_id', $eventId)->update($data);
            return redirect()->route('organizer.index');
        } catch (\Exception $e) {
            return view('site.error');
        }

    }

    // уведомления
    public function notifications ()
    {
        $notifications = Notification::select('*',
        DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i") as format_created_at')
        )
        ->orderBy('id','desc')
        ->paginate(10);
        return view('organizer.notifications', compact('notifications'));
    }

    // уведомление добавить
    public function notificationCreate ()
    {
        return view('organizer.notificationCreate');
    }

    // создать уведомление
    public function notificationStore (Request $request)
    {

        try {
            $data = [
                'organizer_id' => Auth::user()->id,
                'title' => trim($request->input('notification_name')),
                'text' => trim($request->input('notification_text')),
            ];

            $notification = Notification::create($data);
            return redirect()->route('organizer.notifications');
        } catch (\Exception $e) {
            return view('site.error');
        }

    }


    // создать мероприятие
    public function eventStore (Request $request)
    {

        try {

            // мероприятия
            $eventId = _helper_createID();
            $logo = '';

            // количество этапов
            if (is_array($request->input('stage'))){
                $stageCount = count($request->input('stage'));
            } else {
                $stageCount = 0;
            }

            // количество задач
            if (is_array($request->input('task'))){
                $taskCount = count($request->input('task'));
            } else {
                $taskCount = 0;
            }

            // количество критериев
            if (is_array($request->input('criteria'))){
                $criteriaCount = count($request->input('criteria'));
            } else {
                $criteriaCount = 0;
            }

            if ($request->hasFile('organizer_logo')){
                $logo = Service::uploadLogo($request->file('organizer_logo'), $eventId, 1);
            }

            $data = [
                'event_id' => $eventId,
                'organizer_id' => Auth::user()->id,
                'event_name' => trim($request->input('event_name')),
                'event_text' => trim($request->input('event_text')),
                'organizer_name' => trim($request->input('organizer_name')),
                'organizer_text' => trim($request->input('organizer_text')),
                'logo' => $logo
            ];
            Event::create($data);

            //этапы

            for ($i = 0; $i < $stageCount; $i++) {

                $stageId = _helper_createID();
                $stageEnd = _date_YYYY_MM_DD($request->input('stage_date_end')[$i]) . ' ' . $request->input('stage_time_end')[$i];

                $stageNum = $i + 1;
                $solutionRequired = 0;
                if (in_array($stageNum, $request->input('solution_required'))) {
                    $solutionRequired = 1;
                }

                $data = [
                    'stage_id' => $stageId,
                    'event_id' => $eventId,
                    'organizer_id' => Auth::user()->id,
                    'stage' => trim($request->input('stage')[$i]),
                    'stage_short' => trim($request->input('stage_short')[$i]),
                    'stage_description' => trim($request->input('stage_description')[$i]),
                    'stage_description_short' => trim($request->input('stage_description_short')[$i]),
                    'stage_date_end' => $stageEnd,
                    'solution_required' => $solutionRequired,
                ];
                Stage::create($data);
            }

            //dd($data);

            //задачи

            for ($i = 0; $i < $taskCount; $i++) {
                $taskId = _helper_createID();
                $data = [
                    'event_id' => $eventId,
                    'organizer_id' => Auth::user()->id,
                    'task_id' => $taskId,
                    'name' => trim($request->input('task')[$i]),
                    'text' => trim($request->input('task_description')[$i]),
                ];
                Task::create($data);
            }

            //критерии

            for ($i = 0; $i < $criteriaCount; $i++) {
                $data = [
                    'event_id' => $eventId,
                    'organizer_id' => Auth::user()->id,
                    'criteria' => trim($request->input('criteria')[$i]),
                ];
                Criterion::create($data);
            }

            // логотипы партнеров
            if (is_array($request->file('partner_logo'))){
                foreach($request->file('partner_logo') as $partnerLogo){
                    $logo = Service::uploadLogo($partnerLogo, $eventId, 2);
                    $data = [
                        'event_id' => $eventId,
                        'organizer_id' => Auth::user()->id,
                        'logo' => $logo,
                    ];
                    $parther_logos = Logo::create($data);
                }
            }

            return redirect()->route('organizer.index');
        } catch (\Exception $e) {
            return view('site.error');
        }

    }


    // редактировать логотипы партнеров
    public function eventLogosEdit ($eventId)
    {
        try {

            $logos = Logo::where('event_id', $eventId)
            ->orderBy('id')
            ->get();

            return view('organizer.logosEdit', compact('eventId', 'logos'));
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // обновить логотипы партнеров
    public function eventLogosUpdate (Request $request, $eventId)
    {
        try {

            // удаленные элементы, если есть
            if (!empty($request->input('removed-elements'))) {
                $removed = json_decode($request->input('removed-elements'));
                foreach ($removed as $item) {
                    Logo::where('id', $item->id)->delete();
                }
            }

            if (is_array($request->file('partner_logo'))){
                foreach($request->file('partner_logo') as $partnerLogo){
                    $logo = Service::uploadLogo($partnerLogo, $eventId, 2);
                    $data = [
                        'event_id' => $eventId,
                        'organizer_id' => Auth::user()->id,
                        'logo' => $logo,
                    ];
                    $parther_logos = Logo::create($data);
                }
            }

            return redirect()->route('organizer.index');
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // редактировать этапы
    public function eventStagesEdit ($eventId)
    {
        try {

            $stages = Stage::select('*',
                DB::raw('DATE_FORMAT(stage_date_end, "%d.%m.%Y") as stage_date_end'),
                DB::raw('DATE_FORMAT(stage_date_end, "%H:%i") as stage_time_end')
            )
            ->where('event_id', $eventId)
            ->orderBy('id')
            ->get();

            return view('organizer.stagesEdit', compact('eventId', 'stages'));
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // обновить этапы
    public function eventStagesUpdate (Request $request, $eventId)
    {

        //try {

            // количество этапов

            if (is_array($request->input('stage'))){

                $stageCount = count($request->input('stage'));

                // удаленные элементы, если есть
                if (!empty($request->input('removed-elements'))) {
                    $removed = json_decode($request->input('removed-elements'));
                    foreach ($removed as $item) {
                        Stage::where('id', $item->id)->delete();
                    }
                }

                for ($i = 0; $i < $stageCount; $i++) {

                    if (isset($request->input('stage-ids')[$i])) {

                        // если этап есть, то редактировать
                        if (Stage::where('id', $request->input('stage-ids')[$i])->exists()) {

                            $stageEnd = _date_YYYY_MM_DD($request->input('stage_date_end')[$i]) . ' ' . $request->input('stage_time_end')[$i];

                            $stageNum = $i + 1;
                            $solutionRequired = 0;

                            //if (in_array($stageNum, $request->input('solution_required'))) {
                                //$solutionRequired = 1;
                            //}

                            $data = [
                                'stage' => trim($request->input('stage')[$i]),
                                'stage_short' => trim($request->input('stage_short')[$i]),
                                'stage_description' => trim($request->input('stage_description')[$i]),
                                'stage_description_short' => trim($request->input('stage_description_short')[$i]),
                                'stage_date_end' => $stageEnd,
                                'solution_required' => $solutionRequired,
                            ];

                            Stage::where('id', $request->input('stage-ids')[$i])->update($data);

                        }

                    } else {

                        // добавить этап
                        $stageId = _helper_createID();
                        $stageEnd = _date_YYYY_MM_DD($request->input('stage_date_end')[$i]) . ' ' . $request->input('stage_time_end')[$i];

                        $stageNum = $i + 1;
                        $solutionRequired = 0;

                        if (!is_null($request->input('solution_required'))){
                            if (in_array($stageNum, $request->input('solution_required'))) {
                                $solutionRequired = 1;
                            }
                        }

                        $data = [
                            'stage_id' => $stageId,
                            'event_id' => $eventId,
                            'organizer_id' => Auth::user()->id,
                            'stage' => trim($request->input('stage')[$i]),
                            'stage_short' => trim($request->input('stage_short')[$i]),
                            'stage_description' => trim($request->input('stage_description')[$i]),
                            'stage_description_short' => trim($request->input('stage_description_short')[$i]),
                            'stage_date_end' => $stageEnd,
                            'solution_required' => $solutionRequired,
                        ];

                        Stage::create($data);
                    }

                }

            }

            return redirect()->route('organizer.index');
        //} catch (\Exception $e) {
            //return view('site.error');
        //}

    }

    // редактировать задачи
    public function eventTasksEdit ($eventId)
    {
        try {

            $tasks = Task::where('event_id', $eventId)
                ->orderBy('id')
                ->get();
            return view('organizer.tasksEdit', compact('eventId', 'tasks'));
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // обновить задачи
    public function eventTasksUpdate (Request $request, $eventId)
    {

        try {

            if (is_array($request->input('task'))){

                $taskCount = count($request->input('task'));

                // удаленные элементы, если есть
                if (!empty($request->input('removed-elements'))) {
                    $removed = json_decode($request->input('removed-elements'));
                    foreach ($removed as $item) {
                        Task::where('id', $item->id)->delete();
                    }
                }

                for ($i = 0; $i < $taskCount; $i++) {

                    if (isset($request->input('task-ids')[$i])) {

                        $data = [
                            'name' => trim($request->input('task')[$i]),
                            'text' => trim($request->input('task_description')[$i]),
                        ];
                        Task::where('id', $request->input('task-ids')[$i])->update($data);

                    } else {

                        $taskId = _helper_createID();
                        $data = [
                            'event_id' => $eventId,
                            'organizer_id' => Auth::user()->id,
                            'task_id' => $taskId,
                            'name' => trim($request->input('task')[$i]),
                            'text' => trim($request->input('task_description')[$i]),
                        ];

                        Task::create($data);
                    }
                }
            }

            return redirect()->route('organizer.index');
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // редактировать критерии
    public function eventCriteriaEdit ($eventId)
    {
        try {

            $criteria = Criterion::where('event_id', $eventId)
                ->orderBy('id')
                ->get();
            return view('organizer.criteriaEdit', compact('eventId', 'criteria'));
        } catch (\Exception $e) {
            return view('site.error');
        }
    }

    // обновить критерии
    public function eventCriteriaUpdate (Request $request, $eventId)
    {

        try {

            if (is_array($request->input('criteria'))){

                $criteriaCount = count($request->input('criteria'));

                // удаленные элементы, если есть
                if (!empty($request->input('removed-elements'))) {
                    $removed = json_decode($request->input('removed-elements'));
                    foreach ($removed as $item) {
                        Criterion::where('id', $item->id)->delete();
                    }
                }

                for ($i = 0; $i < $criteriaCount; $i++) {

                    if (isset($request->input('criteria-ids')[$i])) {

                        $data = [
                            'criteria' => trim($request->input('criteria')[$i]),
                        ];
                        Criterion::where('id', $request->input('criteria-ids')[$i])->update($data);

                    } else {

                        $data = [
                            'event_id' => $eventId,
                            'organizer_id' => Auth::user()->id,
                            'criteria' => trim($request->input('criteria')[$i]),
                        ];
                        Criterion::create($data);

                    }
                }
            }

            return redirect()->route('organizer.index');
        } catch (\Exception $e) {
            return view('site.error');
        }
    }


    // выход из программы
    public function close()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}