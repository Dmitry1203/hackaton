<?php
// уведомления на странице всех уведомлений
namespace App\View\Components;
use Illuminate\View\Component;
class Notification extends Component
{

    public $notificationId;
    public $notificationNew;
    public $notificationDate;
    public $notificationTitle;
    public $notificationText;
    public $notificationHash;


    public function __construct($notificationId, $notificationNew, $notificationDate,  $notificationTitle, $notificationText)
    {
        $this->notificationId = $notificationId;
        $this->notificationNew = $notificationNew;
        $this->notificationDate = $notificationDate;
        $this->notificationTitle = $notificationTitle;
        $this->notificationText = $notificationText;
        $this->notificationHash = str_replace(" ", ".", $notificationDate);
    }

    public function render()
    {
        return view('components.notification');
    }
}
