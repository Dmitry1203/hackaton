<?php
namespace App\View\Components;
use Illuminate\View\Component;
class TimelineDetail extends Component
{
    public $timelineNumber;
    public $timelineComplete;
    public $timelineNext;
    public $timelinePrevComplete;
    public $timelineStage;
    public $timelineDateEnd;
    public $timelineDescription;

    public function __construct($timelineNumber, $timelineComplete, $timelineNext, $timelinePrevComplete, $timelineStage, $timelineDateEnd, $timelineDescription)
    {

        $this->timelineNumber = $timelineNumber;
        $this->timelineComplete = $timelineComplete;
        $this->timelineNext = $timelineNext;
        $this->timelinePrevComplete = $timelinePrevComplete;
        $this->timelineStage = $timelineStage;
        $this->timelineDateEnd = $timelineDateEnd;
        $this->timelineDescription = $timelineDescription;

    }

    public function render()
    {
        return view('components.timelineDetail');
    }
}
