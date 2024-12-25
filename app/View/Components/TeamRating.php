<?php
namespace App\View\Components;
use Illuminate\View\Component;
class TeamRating extends Component
{
    public $teamName;
    public $teamRating;

    public function __construct($teamName, $teamRating)
    {

        $this->teamName = $teamName;
        $this->teamRating = $teamRating;

    }

    public function render()
    {
        return view('components.rating');
    }
}
