<?php
namespace App\Http\Controllers\Personal;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Task;
use App\Models\Team;
use App\Models\Notification;
use App\Models\Event;
use App\Models\Stage;
use App\Models\Logo;
use App\Models\Video;
use App\Models\Watched;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// сервисный слой
use App\Http\Controllers\Services\Service;

class PersonalController extends Controller
{
    // главная
    public function index ()
    {

    	// 3 последних уведомления, непрочитанные считаются отдельно
    	$notifications = Notification::select('*',
    		DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i") as format_created_at')
    		)
			->orderBy('id','desc')
			->limit(3)
			->get();

        // 3 задачи в раздел Задачи хакатона (справа внизу)
        $tasks = Task::orderBy('name')->limit(3)->get();

        // о мероприятии
        $event = Event::first();

        // для timeline
        // userTeamInfo возвращает полную информацию о моей команде,
        // либо false если я не состою в команде
        // с параметром true - показать аватары

        $myTeamInfo = Service::userTeamInfo();
        $teamId = 0;
        $taskId = 0;
        if(!empty($myTeamInfo['myTeam'][0])){
            // команда пользователя (системный id)
            $teamId = $myTeamInfo['myTeam'][0]->id;
            $taskId = $myTeamInfo['myTeam'][0]->TaskId;
        }

        $hasProfile = Auth::user()->has_profile;
        return view('personal.index', compact('notifications','tasks','event','hasProfile','teamId','taskId'));

	}

    // профиль
    public function profile ()
    {
        /*
        $words = ['год', 'года', 'лет'];
        $age = DB::table('users')
            ->select(
                DB::raw('(YEAR(CURRENT_DATE) - YEAR(date_b)) - (DATE_FORMAT(CURRENT_DATE, "%m.%d") < DATE_FORMAT(date_b, "%m.%d")) as age'),
            )
            ->find(Auth::user()->id)->age;
		$age = self::age_word($age, $words);
        */

        return view('personal.profile');
	}

	// 'год', 'года', 'лет', хотя в данном случае всегда будет ЛЕТ
	public function age_word($value, $words, $show = true)
	{
		$num = $value % 100;
		if ($num > 19) {
			$num = $num % 10;
		}

		$out = ($show) ?  $value . ' ' : '';
		switch ($num) {
			case 1:  $out .= $words[0]; break;
			case 2:
			case 3:
			case 4:  $out .= $words[1]; break;
			default: $out .= $words[2]; break;
		}
		return $out;
	}

    // профиль редактировать
    public function profileEdit ()
    {
        //$user = User::find(Auth::user()->id);
        return view('personal.profileEdit');
	}

    // профиль сохранить
    public function profileUpdate (Request $request)
    {

        $validate = Service::validateProfile($request);
        if (Service::updateProfile($request)){
            return redirect()->route('personal.profile');
        }
        return view('site.error');

	}

    // аватар сохранить
    public function profileAvatar (Request $request)
    {
        if ($request->hasFile('avatar')){
            if (Service::updateAvatar($request)){
                return redirect()->back();
            } else {
                return view('site.error');
            }
        } else {
            return redirect()->back();
        }
	}

    // timeline
    public function timeline ()
    {


        // для timeline
        // userTeamInfo возвращает полную информацию о моей команде,
        // либо false если я не состою в команде
        // с параметром true - показать аватары

        $myTeamInfo = Service::userTeamInfo();
        if(!$myTeamInfo){
            $hasTeam = 0;
            $hasTask = 0;
        } else {
            // команда пользователя (системный id)
            $hasTeam = $myTeamInfo['myTeam'][0]->id;
            $hasTask = $myTeamInfo['myTeam'][0]->TaskId;
        }

        $hasProfile = Auth::user()->has_profile;

        // этапы
        $stages = Stage::select(
            '*',
            'stages.stage_id as StageId',
            DB::raw('(SELECT COUNT(id) FROM solutions WHERE solutions.team_id = '.$hasTeam.' AND solutions.stage_id = StageId) as count'))
            ->get();

        $isComplete = false;
        foreach ($stages as $key=>$stage) {

            $prevComplete = $isComplete;
            $isComplete = false;
            $isNext = false;
            $stageNum = $key + 1;

            if ($stageNum == 1){
                $isNext = true;
            }

            //if (!$isComplete && ($stage->stage_date_end < date('2023-11-10 15:00:00'))){
            if (!$isComplete && ($stage->stage_date_end < date('Y-m-d H:i:s'))){
                 $isComplete = true;
            }

            if ($prevComplete != $isComplete){
                $isNext = true;
            }

            $timeline[$key]['id'] = $stage->id;
            $timeline[$key]['stage'] = $stage->stage;
            $timeline[$key]['stage_date_end'] = $stage->stage_date_end;
            $timeline[$key]['stage_description'] = $stage->stage_description;
            $timeline[$key]['decision_required'] = $stage->decision_required;
            $timeline[$key]['is_next'] = $isNext;
            $timeline[$key]['is_complete'] = $isComplete;
            $timeline[$key]['prev_complete'] = $prevComplete;

        }

		return view('personal.timeline',compact('timeline'));
	}

    // курсы
    public function courses ()
    {
		return view('personal.courses');
	}

    // мероприятие
    public function about ()
    {
        $event = Event::first();
        $logos = Logo::where('event_id', $event->event_id)->get();
        return view('personal.about', compact('event','logos'));
    }

    // обновить пароль
    public function profilePasswordChange (Request $request)
    {
        try {

            $success = 0;
            $currentPassword = trim($request->input('currentPassword'));
            $newPassword = trim($request->input('initialPassword'));
            $confirmPassword = trim($request->input('repeatedPassword'));

            $currentPasswordError = '';
            if (empty($currentPassword)){

                $currentPasswordError = '&#10149; Укажите значение текущего пароля';

            } else {

                // проверить пароль
                $user = User::select('email','password')->where('id', Auth::user()->id)->get();

                if( Hash::check($currentPassword, $user[0]->password )) {
                    $currentPasswordError = '';
                } else {
                    $currentPasswordError = '&#10149; Неправильное значение текущего пароля';
                }
            }

            $newPasswordError = '';
            if (empty($newPassword)){
                $newPasswordError = '&#10149; Укажите значение нового пароля';
            } elseif (strlen($newPassword) < 8) {
                $newPasswordError = '&#10149; Длина нового пароля должна быть не менее 8-и символов';
            } else {
                //if (preg_match('/[^A-Za-z0-9-]+/', $newPassword)){
                if (!preg_match('/[^а-яА-Я]+/', $newPassword)){
                   $newPasswordError = '&#10149; Некорректное значение нового пароля';
                }
            }

            $confirmPasswordError = '';

            if (!empty($newPassword) && empty($confirmPassword)){
                $confirmPasswordError = '&#10149; Повторите новый пароль';
            }

            if (!empty($newPassword) && !empty($confirmPassword) && ($newPassword  !=  $confirmPassword)){
                $confirmPasswordError = '&#10149; Значение паролей не совпадают';
            }

            if (empty($currentPasswordError) && empty($newPasswordError) && empty($confirmPasswordError)){

                // ошибок нет, можно менять пароль

                User::where('id', Auth::user()->id)->update(['password' => Hash::make($newPassword)]);
                $success = 1;

                // уведомление

                Service::sendMail($newPassword, Auth::user()->email, 3);

            }

            $data = [
                'currentPasswordError' => $currentPasswordError,
                'newPasswordError' => $newPasswordError,
                'confirmPasswordError' => $confirmPasswordError,
                'success' => $success
            ];

            return response()->json([
                'status' => 'OK',
                'data' => $data
            ]);


        } catch (\Exception $e) {
            return response()->json([
                'status' => 'INTERNAL_SERVER_ERROR'
            ]);
        };

    }

    // сгененрить пароли и отправить почту
    public function profilePasswordsCreate(){

        //$users = User::select('id','name','surname','email')->where('is_sponsor', 0)->limit(1)->get();
        // 30 60 90 120 150

        $limit = 30;
        $offset = 90;

        $users = User::select('id','name','surname','email')
        ->where('is_sponsor', 0)
        ->skip($offset)->take($limit)
        ->get();

        /*
        $users = User::select('id','name','surname','email')
         ->whereIn('id', [214, 216, 217])
         ->get();
         */

        $p = "";

        foreach($users as $user){

            $password = Service::randomValue();
            $hash = Hash::make($password);
            //echo $user->id;
            echo $user->email;
            echo ' / ' . $password;
            echo '<br>';

            //$p .= $user->email . '/' . $password . '<br>';
            //$data = ['password' => $hash];
            //User::where('id', $user->id)->update($data);
            //Service::sendMail($password, $user->email, 1);

        }

        //Service::sendMail($p, 'dmitry1203@gmail.com', 1);
        //Service::sendMail($p, 'v@klv.me', 1);

    }

    // intensive
    public function intensive ()
    {
        //$video = Video::all();
        $video = Video::where('is_visible', 1)->get();
        $watched = Watched::where('user_id', Auth::user()->user_id)->get();
        return view('personal.intensive', compact('video','watched'));
    }

    // video
    public function video ($videoId)
    {

        $video = Video::where('video_id', $videoId)->first();
        if (!is_null($video)){

            $watchCount = Watched::where('user_id', Auth::user()->user_id)
                ->where('video_id', $videoId)
                ->count();

            if ($watchCount == 0){
                $data = [
                    'user_id' => Auth::user()->user_id,
                    'video_id' => $videoId,
                ];
                Watched::create($data);
            }

            return view('personal.video', compact('video'));
        } else {
            Abort(404);
        }

    }

    // result
    public function rating ()
    {

        $teams = Team::leftJoin('results', 'results.team', '=', 'teams.team_id')
            ->where('teams.task_id', '=', 2)
            ->where('teams.has_solutions', '=', 1)
            ->where('results.result', '>', 0)
            ->orderBy('results.result', 'desc')
            ->get(['teams.team as TeamName', 'results.result as TeamResult']);
        return view('personal.rating', compact('teams'));

    }

    // выход из программы
    public function close()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
