<?php
namespace App\View\Components;
use Illuminate\View\Component;
class HakatonTask extends Component
{
    public $taskId;
    public $taskName;
    public function __construct($taskId, $taskName)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
    }

    public function render()
    {
        return view('components.hakatonTask');
    }
}
