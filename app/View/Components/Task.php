<?php
namespace App\View\Components;
use Illuminate\View\Component;
class Task extends Component
{
    public $taskId;
    public $taskName;
    public $taskActive;
    public function __construct($taskId, $taskName, $taskActive)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskActive = $taskActive;
    }

    public function render()
    {
        return view('components.task');
    }
}
