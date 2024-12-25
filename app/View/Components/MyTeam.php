<?php
namespace App\View\Components;
use Illuminate\View\Component;
class MyTeam extends Component
{
    public $teamId;
    public $teamName;
    public $teamTask;
    public $teamAvatars;
    public $teamUsersCountPlus;
    public function __construct($teamId, $teamName, $teamTask, $teamAvatars, $teamUsersCount)
    {
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->teamTask = $teamTask;
        // в компонент передадим снова массив
        $toArray = explode("|", $teamAvatars);
        $this->teamAvatars = $toArray;
        $this->teamUsersCountPlus = $teamUsersCount - count($toArray);
    }

    public function render()
    {
        return view('components.myTeam');
    }
}
