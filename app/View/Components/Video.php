<?php
// видео
namespace App\View\Components;
use Illuminate\View\Component;
class Video extends Component
{

    public $videoId;
    public $videoWatched;
    public $videoName;

    public function __construct($videoId, $videoWatched, $videoName)
    {
        $this->videoId = $videoId;
        $this->videoWatched = $videoWatched;
        $this->videoName = $videoName;
    }

    public function render()
    {
        return view('components.video');
    }
}
