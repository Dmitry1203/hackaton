<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class MainMenu extends Component
{
    public $newNotifications;
    public function __construct()
    {
    	// меню должно знать количество новых уведомлений
		$this->newNotifications = Notification::select('id')
			->where('id', '>', Auth::user()->last_notification_id)
			->count();
    }

    public function render()
    {
        //return view('components.mainMenuAll');
        return view('components.mainMenu');
    }
}
