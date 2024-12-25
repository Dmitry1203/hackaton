<?php
// уведомления на главной странице
namespace App\View\Components;
use Illuminate\View\Component;
class NotificationMain extends Component
{
    public $notificationLink;
    public $notificationDate;
    public $notificationHash;
    public $notificationTitle;
    public function __construct($notificationLink, $notificationDate,  $notificationTitle)
    {
        $this->notificationLink = $notificationLink;
        $this->notificationDate = $notificationDate;
        $this->notificationTitle = $notificationTitle;
        $this->notificationHash = str_replace(" ", ".", $notificationDate);
    }

    public function render()
    {
        return view('components.notificationMain');
    }
}
