<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ServicesApiController;
use App\Http\Resources\TeamResource;
use App\Http\Resources\MemberResource;
use App\Http\Resources\SolutionResource;
use App\Http\Resources\RatingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Team;
use App\Models\User;
use App\Models\Solution;

class TeamApiController extends Controller
{
    // команды
    public function index($token, $role)
    {

    	if (ServicesApiController::authorization($token)){

            if ($role == 100){

                $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                    ->whereNotNull('teams.has_solutions')
                    ->orderBy('teams.team')
                    ->get(['teams.*', 'tasks.task_id as TaskId', 'tasks.name as Task']);

            } else {

    	        $teams = Team::leftJoin('tasks', 'tasks.id', '=', 'teams.task_id')
                    ->where('teams.task_id', $role)
                    ->whereNotNull('teams.has_solutions')
                    ->orderBy('teams.team')
                    ->get(['teams.*', 'tasks.task_id as TaskId', 'tasks.name as Task']);

            }


	        return TeamResource::collection($teams);
    	}
    	return null;
    }

    // одна команда
    public function team($token, $id)
    {

        if (ServicesApiController::authorization($token) && !empty($id)){

            if (is_null(Team::where('team_id', $id)->first())){
                return [];
            } else {
                $team = Team::Leftjoin('tasks', 'tasks.id', '=', 'teams.task_id')
                    ->where('teams.team_id',  $id)
                    ->get(['teams.*', 'tasks.id as TaskId', 'tasks.task_id as TaskExternalId', 'tasks.name as Task']);
                return TeamResource::collection($team);
            }
        }
        return [];
    }

    // участники команды
    public function members($token, $id)
    {

        if (ServicesApiController::authorization($token) && !empty($id)){

            // участники команды, здесь нужен внутренный id, сначала найдем его
            $id = Team::select('id')->where('team_id', $id)->first()->id;
            if (!is_null($id)){
                $members = User::select(
                    'user_id',
                    'name',
                    'surname',
                    'about_me',
                    'avatar',
                    DB::raw('(YEAR(CURRENT_DATE) - YEAR(date_b)) - (DATE_FORMAT(CURRENT_DATE, "%m.%d") < DATE_FORMAT(date_b, "%m.%d")) as age'),
                    )
                    ->where('team_id', $id)
                    ->where('is_sponsor', 0)
                    ->where('is_jury', 0)
                    ->get();

                return MemberResource::collection($members);
            } else {
               return [];
            }
        }
        return null;
    }


    // решения команды
    public function solutions($token, $id)
    {

        if (ServicesApiController::authorization($token) && !empty($id)){
            // участники команды, здесь нужен внутренный id, сначала найдем его
            $id = Team::select('id')->where('team_id', $id)->first()->id;

            if (!is_null($id)){
                $solutions = Solution::select(
                    'stage_id',
                    'solution',
                    DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i") as _created_at'))
                    ->where('team_id', $id)
                    ->get();

                return SolutionResource::collection($solutions);
            } else {
               return null;
            }
        }
        return null;
    }


    // установить рейтинг
    // не используется
    public function criteria(Request $request)
    {

        $data = json_decode(file_get_contents("php://input"), true);
        $teamId = $data['teamId'];
        $userId = $data['userId'];
        $criteria = $data['criteria'];

        $data = [
            'team_id' => $data['teamId'],
            'user_id' => $data['userId'],
            'criteria_1' => $criteria[0]['sections'][0]['activeIndex'],
            'criteria_2' => $criteria[0]['sections'][1]['activeIndex'],
            'criteria_3' => $criteria[0]['sections'][2]['activeIndex'],
            'criteria_4' => $criteria[1]['sections'][0]['activeIndex'],
            'criteria_5' => $criteria[1]['sections'][1]['activeIndex'],
            'criteria_6' => $criteria[1]['sections'][2]['activeIndex'],
            'criteria_7' => $criteria[2]['sections'][0]['activeIndex'],
            'criteria_8' => $criteria[2]['sections'][1]['activeIndex'],
            'criteria_9' => $criteria[3]['sections'][0]['activeIndex'],
        ];

        $content = [
            "status" => "SUCCESS",
            "data" => $data,
        ];
        return response($content);

    }

}
