<?php
namespace App\View\Components;
use Illuminate\View\Component;
class Stage extends Component
{
    public $eventId;
    public $stageId;
    public $stageName;
    public $stageDescriptionShort;
    public $stageDateEnd;
    public $isLoadedSolution;

    public function __construct($eventId, $stageId, $stageName, $stageDescriptionShort, $stageDateEnd, $isLoadedSolution)
    {

        $this->eventId = $eventId;
        $this->stageId = $stageId;
        $this->stageName = $stageName;
        $this->stageDescriptionShort = $stageDescriptionShort;
        $this->stageDateEnd = $stageDateEnd;
        $this->isLoadedSolution = ($isLoadedSolution > 0) ? 'loaded' : '';
    }

    public function render()
    {
        return view('components.stage');
    }
}
