<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class InvitationTeam  extends Component
{
    public $invitationId;
    public $invitationStatus;
    public $teamId;
    public $teamName;
    public $teamTask;
    public $teamAvatars;
    public $teamUsersCountPlus;

    public function __construct($invitationId, $invitationStatus, $teamId, $teamName, $teamTask)
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

        $this->invitationId = $invitationId;
        $this->invitationStatus = $invitationStatus;
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->teamTask = $teamTask;
        $this->teamAvatars = $avatars;
        $this->teamUsersCountPlus = count($users) - 5;
    }

    public function render()
    {
        return view('components.invitationTeam');
    }
}
