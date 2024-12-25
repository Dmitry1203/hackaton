<?php
namespace App\Http\Controllers\Personal;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;
// сервисный слой
use App\Http\Controllers\Services\Service;

class NotificationController extends Controller
{

    // задачи
    public function notifications()
    {
		try {
			$notifications = Notification::select('*',
				DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y %H:%i") as format_created_at')
				)
				->orderBy('id','desc')
				->get();

			// новые уведомление
			$newNotifications = Notification::select('id')
				->where('id', '>', Auth::user()->last_notification_id)
				->count();

			if (count($notifications) > 0){
				// установить пользователю поле last_notification_id в id последнего уведомления
				$data = [
					'last_notification_id' => $notifications[0]->id,
				];
				User::where('id', Auth::user()->id)->update($data);
			} else {
				$notifications = [];
			}

			return view('personal.notifications', compact('notifications', 'newNotifications'));

		} catch (\Exception $e) {
			return view('site.error');
		}

	}

	// создать уведомление (тест)
    public function notificationStore (Request $request)
    {
    	$title = "Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.";
    	$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.";

		$data = [
            'title' => $title,
            'text' => $text,
        ];

        $notification = Notification::create($data);
        return redirect()->route('personal.index');

	}




}