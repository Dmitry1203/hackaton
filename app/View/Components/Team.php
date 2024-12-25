<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class Team extends Component
{
    public $teamId;
    public $teamName;
    public $teamTask;
    public $teamTaskId;
    public $teamApplicationCreated;
    public $teamApplicationStatus;
    public $inTeam;

    public $teamAvatars;
    public $teamUsersCountPlus;

    public function __construct($teamId, $teamName, $teamTask, $teamTaskId, $teamApplicationCreated, $teamApplicationStatus, $inTeam)
    {

        // системный id этой команды
        $id = DB::table('teams')->select('id')->where('team_id', $teamId)->get()[0]->id;
        // все участники команды
        $users = DB::table('users')->select('id','avatar')
            ->orderBy('id', 'desc')
            ->where('team_id', $id)
            ->get();

        $avatars = [];
        foreach($users as $key=>$user) {
            if ($key < 5){
                $avatars[] = $user->avatar;
            }
        }

        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->teamTask = $teamTask;
        $this->teamTaskId = $teamTaskId;
        $this->teamApplicationCreated = $teamApplicationCreated;
        $this->teamApplicationStatus = $teamApplicationStatus;
        $this->inTeam = $inTeam;
        $this->teamAvatars = $avatars;
        $this->teamUsersCountPlus = count($users) - 5;

    }

    public function render()
    {
        return view('components.team');
    }
}
