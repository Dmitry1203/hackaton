<?php
namespace App\Http\Controllers\Personal;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Team;
use App\Models\Task;
use App\Models\User;
use App\Models\Invitation;
use App\Models\Application;
// сервисный слой
use App\Http\Controllers\Services\Service;

class TeamController extends Controller
{

    // команды
    public function teams ()
    {

        // userTeamInfo возвращает полную информацию о моей команде,
        // либо false если я не состою в команде
        // с параметром true - показать аватары

        $myTeamInfo = Service::userTeamInfo(true);

        $myTeam = [];
        $avatarsInString = '';
        $usersInMyTeam = 0;

        if (!$myTeamInfo){

            // у меня нет команды, покажем все
            $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->where('teams.id', '!=', 66)
                ->where('teams.id', '!=', 78)
                ->get(['teams.*', 'tasks.task_id as TaskId', 'tasks.name as Task']);

        } else {

            $myTeam = $myTeamInfo['myTeam'];
            $usersInMyTeam = $myTeamInfo['count'];

            // аватары в компонент передадим строкой
            $avatarsInString = implode("|", $myTeamInfo['avatars']);

            // у меня есть команда, покажем чужие отдельно
            $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->where('teams.id', '!=', $myTeam[0]->id)
                ->where('teams.id', '!=', 66)
                ->where('teams.id', '!=', 78)
                ->orderBy('teams.team')
                ->get(['teams.*', 'tasks.task_id as TaskId', 'tasks.name as Task']);
        }

        // заявки в команду ?
        $applications = Application::where('user_id', Auth::user()->id)->get();

        // список задач для фильтра
        $tasks = Task::select('task_id','name')
            ->where('event_id', _event())
            ->orderBy('name')
            ->get();

        // пригласили меня

        //$teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
        //        ->get(['teams.*', 'tasks.task_id as TaskId', 'tasks.name as Task']);

        $invitations = Invitation::join('teams', 'teams.id', '=', 'invitations.team_id')
            ->leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
            ->where('invitations.email', Auth::user()->email)
            ->orderBy('invitations.id')
            ->get(['invitations.*','teams.team as Team','teams.team_id as TeamId','tasks.name as Task']);

        $newInvitations = Invitation::where('email', Auth::user()->email)
            ->where('status', 1)
            ->count();

        return view('personal.teams', compact(
            'myTeam',
            'teams',
            'tasks',
            'applications',
            'avatarsInString',
            'usersInMyTeam',
            'invitations',
            'newInvitations'));
    }

    // рейтинг
    public function teamsRating ()
    {

        $teams1 = Team::select('team','rating')
            ->where ('rating', '>', 0)
            ->where ('task_id',  1)
            ->orderBy('rating', 'desc')
            ->get();
        $teams2 = Team::select('team','rating')
            ->where ('rating', '>', 0)
            ->where ('task_id',  2)
            ->orderBy('rating', 'desc')
            ->get();
        $teams3 = Team::select('team','rating')
            ->where ('rating', '>', 0)
            ->where ('task_id',  3)
            ->orderBy('rating', 'desc')
            ->get();

        return view('personal.rating', compact('teams1','teams2','teams3'));

    }

    // команды для vue компонента (пока не используем)
    public function teamsVue ()
    {

        $myTeam = Service::userTeamInfo();
        if (!$myTeam){
            // у меня нет команды
            $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->get(['teams.*', 'tasks.name as Task']);
        } else {
            // у меня есть команда
            $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->where('teams.id', '!=', $myTeam[0]->id)
                ->get(['teams.*', 'tasks.name as Task']);
        }
    	return response()->json($teams);
	}

    // команда создать
    public function teamCreate (Request $request)
    {

        $myTeamInfo = Service::userTeamInfo();
        return view('personal.teamCreate', compact('myTeamInfo'));

	}

    // команда сохранить
    public function teamStore (Request $request)
    {
        $teamID = _helper_createID();
        $validate = Service::validateTeam($request);
        if (Service::createTeam($request, $teamID)){
            return redirect()->route('personal.teams');
        }
		return view('site.error');
	}

    // команда профиль
    public function teamProfile ($id = null)
    {

        if (is_null($id)) {

            // моя команда если она есть

            $myTeamInfo = Service::userTeamInfo();
            if (!$myTeamInfo){
                // у меня нет команды
                Abort(404);
            }

            // другие участники команды
            $myTeam = $myTeamInfo['myTeam'];
            $membersTeam = User::select('*',
                DB::raw('(YEAR(CURRENT_DATE) - YEAR(date_b)) - (DATE_FORMAT(CURRENT_DATE, "%m.%d") < DATE_FORMAT(date_b, "%m.%d")) as age'),
                DB::raw('DATE_FORMAT(join_team, "%d.%m.%Y") as join_team'),
                )
                ->where('team_id', $myTeam[0]->id)
                ->get();

            // приглашения

            $invitations = Invitation::join('users', 'users.id', '=', 'invitations.author_id')
                ->where('invitations.team_id', $myTeam[0]->id)
                ->orderBy('invitations.id', 'desc')
                ->get([
                    'users.id as AuthorId',
                    'users.name as AuthorName',
                    'users.surname as AuthorSurname',
                    'users.avatar as AuthorAvatar',
                    'invitations.email',
                    'invitations.status',
                    'invitations.invited_user_id',
                    'invitations.join_team',
                    DB::raw('DATE_FORMAT(invitations.created_at, "%d.%m.%Y %H:%i") as created'),
                ]);

            // количество новых приглашений, отправленных от моей команды и еще не принятых
            $newInvitations = Invitation::where('team_id', Auth::user()->team_id)
                ->where('status', 1)
                ->count();

            // заявки в команду

            $applications = Application::join('users', 'users.id', '=', 'applications.user_id')
                ->where('applications.team_id', $myTeam[0]->team_id)
                ->where('applications.status', 1)
                ->get([
                    'users.id as UserId',
                    'users.email as UserEmail',
                    'users.name as UserName',
                    'users.surname as UserSurname',
                    'users.is_job_search as UserJobSearch',
                    'users.education as UserEducation',
                    'users.experience as UserExperience',
                    'users.about_me as UserAbout',
                    'users.avatar as UserAvatar',
                    'applications.*'
                ]);

            return view('personal.teamProfile', compact(
                'myTeam',
                'membersTeam',
                'invitations',
                'newInvitations',
                'applications'
            ));

        } else {

            // другие команды

            $team = Team::Leftjoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->where('teams.team_id',  $id)
                ->get(['teams.*', 'tasks.id as TaskId', 'tasks.task_id as TaskExternalId', 'tasks.name as Task']);

            if (count($team) == 0){
                Abort(404);
            }

            // участники команды

            $membersTeam = User::select('*',
                DB::raw('(YEAR(CURRENT_DATE) - YEAR(date_b)) - (DATE_FORMAT(CURRENT_DATE, "%m.%d") < DATE_FORMAT(date_b, "%m.%d")) as age'),
                )
                ->where('team_id', $team[0]->id)
                ->get();


            // я подавал сюда заявку ?
            $myApplication = Application::where('user_id', Auth::user()->id)
                ->where('status', 1)
                ->where('team_id', $id)
                ->get();

            return view('personal.teamProfileOther', compact(
                'team',
                'membersTeam',
                'myApplication'
            ));

        }

	}

    // команда редактировать
    public function teamEdit ()
    {

        $myTeamInfo = Service::userTeamInfo();
        if (!$myTeamInfo){
            // у меня нет команды
            Abort(404);
        } else {
            // у меня есть команда
            $myTeam = $myTeamInfo['myTeam'];
            $team = Team::where('teams.id', $myTeam[0]->id)->get();
        }

        return view('personal.teamEdit', compact('team'));
	}

    // команда обновить
    public function teamUpdate (Request $request)
    {

        $validate = Service::validateTeam($request);

        // получить id команды
        // передавать нигде не надо !
        $myTeam = Service::userTeamInfo()['myTeam'];

        // используем системный id
        $id = $myTeam[0]->id;

        // для логотипа
        $teamId = $myTeam[0]->team_id;

        if (!empty($id)){
            if (Service::updateTeam($request, $id, $teamId)){
                return redirect()->route('personal.team.profile');
            }
        }
		return view('site.error');
	}

    // покинуть команду
    public function teamLeave (Request $request)
    {

        // внешний ID моей команды
        $myTeam = Service::userTeamInfo()['myTeam'][0];

        $id = $myTeam->id;
        $teamId = $myTeam->team_id;

        // сколько участников в команде
        $inTeam = User::where('team_id', $id)->count();

        $data = [
            'team_id' => NULL,
            'join_team' => NULL
        ];
        User::where('id', Auth::user()->id)->update($data);

        // удалить команду, если последний участник
        if ($inTeam == 1){
            Team::where('id', $id)->delete();
            Invitation::where('team_id', $id)->delete();
        }

        // удалить заявку если была
        Application::where('user_id', Auth::user()->id)->where('team_id', $teamId)->delete();
        return redirect()->route('personal.teams');
	}

    // отправить приглашение
    public function teamInvitationCreate (Request $request)
    {

        $myTeamInfo = Service::userTeamInfo();
        if ($myTeamInfo){

            // email приглашенного
            $invitedEmail = substr(trim($request->input('email')), 0, 32);
            $invitedUser = User::select('id','user_id','name')->where('email', $invitedEmail)->first();
            // по умолчению
            $invitedUserId = 0;
            if (!is_null($invitedUser)) {
                // если пользователь есть, то определяем id
                $invitedUserId = $invitedUser->id;
            }

            if (Service::teamInvitationCreate($invitedEmail, $myTeamInfo['myTeam'][0]->id, $invitedUserId)){
                return redirect()->route('personal.team.profile');
            } else {
                return view('site.error');
            }

        } else {
            return view('site.error');
        }

    }

    // отправить заявку на участие 10.12.22
    // js function sendTeamApplyForm(event, list)
    public function teamApplicationCreate ()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $teamId = $data['teamId'];
        $message = $data['message'];
        $response = ['success' => Service::teamApplicationCreate($teamId, $message)];
        return $response;
    }


    // принять заявку в команду
    public function teamApplicationAccept (Request $request)
    {

        // id моей команды
        $teamId = Auth::user()->team_id;
        $applicationId = $request->input('application-accept-id');

        if (!empty($applicationId) && !empty($teamId)){

            $result = Service::teamApplicationAccept($teamId, $applicationId);

            if ($result == 1){

                // заявка принята
                return redirect()->route('personal.team.profile');

            } elseif ($result == 2) {

                // пользователь уже в другой команде
                return redirect()->route('personal.team.profile')->with(['teamExist' => true]);

            } elseif ($result == 100) {

                // что-то не так
                return view('site.error');

            }

        }
        return view('site.error');
    }

    // отклонить заявку в команду
    // заявка будет удалена
    public function teamApplicationDecline (Request $request)
    {
        $applicationId = $request->input('application-decline-id');

        if (!empty($applicationId)){
            if (Service::teamApplicationDecline($applicationId)){
                return redirect()->route('personal.team.profile');
            }
        }
        return view('site.error');
    }


    // принять приглашение в команду
    public function teamInvitationAccept (Request $request)
    {

        // изменили статус приглашения на принято (2)
        $invitationId = $request->input('accept-invitation-id');
        $teamId = $request->input('accept-invitation-team-id');
        if (!empty($invitationId)){
            if (Service::teamInvitationAccept($invitationId, $teamId)){
                return redirect()->route('personal.team.profile');
            }
        }
        return view('site.error');
    }


    // отклонить приглашение в команду
    public function teamInvitationDecline (Request $request)
    {

        $invitationId = $request->input('decline-invitation-id');
        $teamId = $request->input('decline-invitation-team-id');
        if (!empty($invitationId)){
            if (Service::teamInvitationDecline($invitationId, $teamId)){
                return redirect()->route('personal.teams');
            }
        }
        return view('site.error');

    }


}
