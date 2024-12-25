<?php
namespace App\Http\Controllers\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

// модели
use App\Models\User;
use App\Models\Team;
use App\Models\Task;
use App\Models\Invitation;
use App\Models\Application;
use App\Models\Event;

class Service
{

    // информация о команде и задаче
	public static function userTeamInfo($showAvatars = false)
	{
        // id моей команды (id) из Users
        $myTeamId = User::where('id', Auth::user()->id)->first()->team_id;

        if (!is_null($myTeamId)){

            $myTeam = Team::Leftjoin('tasks', 'tasks.id', '=', 'teams.task_id')
                ->where('teams.id',  $myTeamId)
                ->get(['teams.*', 'tasks.id as TaskId', 'tasks.task_id as TaskExternalId', 'tasks.name as Task']);

            $avatars = [];
            $count = 0;

            if ($showAvatars) {

                // участники команды, аватаров покажем 5
                $users = User::select('id','avatar')
                    ->orderBy('id', 'desc')
                    ->where('team_id', $myTeamId)
                    ->get();
                $count = count($users);

                $avatars = [];
                foreach($users as $key=>$user) {
                    if ($key < 5){
                        $avatars[] = $user->avatar;
                    }
                }

            }

            $data = [
                'myTeam' => $myTeam,
                'avatars' => $avatars,
                'count' => $count,
            ];

            return $data;

        } else {
            return false;
        }
	}


    // логин
	public static function validateLoginUser(Request $request)
	{
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => '&#10149; Укажите Ваш e-mail',
            'email.email' => '&#10149; Укажите правильный формат e-mail',
            'password.required' => '&#10149; Укажите Ваш пароль',
        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();
	}

	// регистрация
	public static function validateRegisterUser(Request $request)
	{
        $rules = [
            'name' => 'required|max:32',
            'surname' => 'required|max:32',
            'phone' => 'required|max:24',
            'email' => 'required|email|unique:users|max:64',
        ];
        $messages = [
            'name.required' => '&#10149; Укажите имя',
            'name.max' => '&#10149; Слишком много символов',
            'surname.required' => '&#10149; Укажите фамилию',
            'surname.max' => '&#10149; Слишком много символов',
            'phone.required' => '&#10149; Укажите номер телефона',
            'phone.max' => '&#10149; Слишком много символов',
            'email.required' => '&#10149; Укажите e-mail',
            'email.email' => '&#10149; Укажите правильный формат e-mail',
            'email.unique' => '&#10149; Такой e-mail уже существует',
            'email.max' => '&#10149; Слишком много символов',
        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();
	}

    // добавить пользователя
    public static function createUser(Request $request, $userId, $email)
    {
        //$password = self::randomValue();
        $id = 0;
        $data = [
            'user_id' => $userId,
            'email' => $email,
            'name' => trim($request->input('name')),
            'surname' => trim($request->input('surname')),
            'phone' => trim($request->input('phone')),
        ];

        try {
            $user = User::create($data);

            // отправляем сообщение через dashamail
            // self::sendMail($password, $email, 'register');
            // если пользователь имел прглашения на свой email, то надо изменить таблицу приглашений
            // Invitation::where('email', $email)->update(['invited_user_id' => $user->id]);

            return $user->id;
        } catch (\Exception $e) {
            return false;
        }
    }

    // валидация email при восстановлении
    public static function validateEMail(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];
        $messages = [
            'email.required' => '&#10149; Укажите Ваш e-mail',
            'email.email' => '&#10149; Укажите правильный формат e-mail',
        ];
        return Validator::make($request->all(), $rules, $messages)->validate();
    }

    // ссылка для восстановления пароля пользователя
    public static function createLinkForPasswordUpdate($email)
    {

        // находим пользователя с таким email

        $user = User::where('email', $email)->get();

        // если такой пользователь есть
        if (count($user) == 1){
            try {
                $token = self::randomValue(64);
                User::where('id', $user[0]->id)->update(['remember_token' => $token]);
                $message = route('password.update', ['token' => $token]);
                $subject = 'Восстановление пароля';
                $templateId = 3603063;
                //self::sendMail($body, $email, 2);
                return self::sendMailDasha($email, $subject, $message, $templateId);
            } catch (\Exception $e) {
                return false;
            }

        }
        return false;

    }

    // обновить пароль
    public function passwordUpdate($id, $email)
    {
        try {
            $userPassword = self::randomValue();
            User::where('id', $id)->update([
               'remember_token' => null,
               'password' => Hash::make($userPassword)
            ]);

            //self::sendMail($userPassword, $email, 3);

            $subject = 'Восстановление пароля';
            $templateId = 3603073;

            if (self::sendMailDasha($email, $subject, $userPassword, $templateId)){
                $msg = 'Ваш новый пароль выслан на электронный адрес, указанный при регистрации.';
            } else {
                $msg = 'Что то пошло не так...';
            }

        } catch (\Exception $e) {
            $msg = 'Что то пошло не так...';
        }
        return $msg;
    }

	// обновить профиль валидация
	public static function validateProfile(Request $request)
	{
        $rules = [
            'name' => 'required|max:32',
            'surname' => 'required|max:32',
            'phone' => 'required|max:24',
            'birthdate' => 'required',
            'city' => 'required|max:32',
            'experience-hack' => 'max:256',
            'education' => 'max:256',
            'experience' => 'max:256',
            'about-me' => 'max:256',
        ];
        $messages = [
            'name.required' => '&#10149; Поле должно быть заполнено',
            'name.max' => '&#10149; Слишком много символов',
            'surname.required' => '&#10149; Поле должно быть заполнено',
            'surname.max' => '&#10149; Слишком много символов',
            'phone.required' => '&#10149; Поле должно быть заполнено',
            'birthdate.required' => '&#10149; Поле должно быть заполнено',
            'city.required' => '&#10149; Поле должно быть заполнено',
            'city.max' => '&#10149; Слишком много символов',
            'experience-hack.max' => '&#10149; Слишком много символов',
            'education.max' => '&#10149; Слишком много символов',
            'experience.max' => '&#10149; Слишком много символов',
            'about-me.max' => '&#10149; Слишком много символов',

        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();
	}

	// обновить профиль
	public static function updateProfile(Request $request)
	{

		if ($request) {

			try {

                $d = _date_YYYY_MM_DD($request->input('birthdate'));

                if ($d == '1970-01-01'){
                    $d == '';
                }

				$data = [
					'name' => trim($request->input('name')),
					'surname' => trim($request->input('surname')),
					'phone' => trim($request->input('phone')),
					'date_b' => $d,
                    'city' => trim($request->input('city')),
                    'level' => $request->input('level'),
                    'experience_hack' => trim($request->input('experience-hack')),
                    'is_job_search' => $request->input('job-search'),
                    'education' => trim($request->input('education')),
                    'experience' => trim($request->input('experience')),
					'about_me' => trim($request->input('about-me')),
					'has_profile' => 2,
				];

				if ($request->hasFile('avatar')){
					$avatarName = Service::updateAvatar($request->file('avatar'));
					if ($avatarName){
						$data += ['avatar'=>$avatarName];
					}
				}

				User::where('id', Auth::user()->id)->update($data);
				return true;
			} catch (\Exception $e) {
				return false;
			}
		}
		return false;
	}

	// обновить аватар
	public static function updateAvatar($file)
	{
        try {

            $extension = $file->extension();
            $photoName = Auth::user()->user_id."_".time().".{$extension}";
            $source = "public/images/source/";
            $avatars = "public/images/avatars/";
            $image = $file;

            // проверить поворот картинок (jpg)
            if ($extension != 'png'){
                $exif = exif_read_data($file);
                if(!empty($exif['Orientation'])) {
                    switch($exif['Orientation']) {
                        case 8:
                            $image = Image::make($file)->rotate(90);
                            break;
                        case 3:
                            $image = Image::make($file)->rotate(180);
                            break;
                        case 6:
                            $image = Image::make($file)->rotate(-90);
                            break;
                    }
                }
            }

            // сохраняем оригинал
            Storage::putFileAs($source, $image, $photoName);

            // аватар 300, сохраняем пропорции
            $imageResize = Image::make($image)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put($avatars.$photoName, $imageResize);
            $imageResize->destroy();

            $data = [
                'avatar' => $photoName,
            ];
            User::where('id', Auth::user()->id)->update($data);

            return $photoName;
        } catch (\Exception $e) {
            return false;
        }
	}


    // добавить логотип организатор/партнер

    public static function uploadLogo($file, $eventId, $type)
    {

        // 1 - организатор
        // 2 - партнер

        try {

            $extension = $file->extension();
            if ($type == 1){
                $logoName = "logo_{$eventId}.{$extension}";
            } else {
                $logoId = _helper_createID();
                $logoName = "logo_partner_{$logoId}_{$eventId}.{$extension}";
            }


            $source = "public/images/source/";
            $logos = "public/images/logo/";

            // сохраняем оригинал
            // Storage::putFileAs($source, $file, $logoName);
            Storage::putFileAs($logos, $file, $logoName);


/*
            $imageResize = Image::make($file)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');
*/

            //Storage::put($logos.$logoName, $imageResize);
            //$imageResize->destroy();


            return $logoName;
        } catch (\Exception $e) {
            return false;
        }
    }


    // создать команду валидация
	public static function validateTeam(Request $request)
	{
        $rules = [
            'description' => 'max:256',
            'chat' => 'max:64',
        ];
        $messages = [
			'description.max' => '&#10149; Слишком много символов',
			'chat.max' => '&#10149; Слишком много символов',
        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();
	}

	// создать команду
	public static function createTeam(Request $request, $teamID)
	{
		$logoName = '';
		if ($request->hasFile('logo')){
			$logoName = Service::createLogo($request->file('logo'), $teamID);
		}

        $data = [
            'team_id' => $teamID,
            'task_id' => 0,
            'team' => trim($request->input('team')),
            'description' => trim($request->input('description')),
            'chat' => trim($request->input('chat')),
            'logo' => $logoName
        ];

        try {
            // добавить команду и id в таблицу User
            $team = Team::create($data);
            $data = ['team_id' => $team->id];

            // создатель автоматически вступает в команду
            User::where('id', Auth::user()->id)->update($data);
            return $team->id;
        } catch (\Exception $e) {
            return false;
        }
	}

	// обновить команду
	public static function updateTeam(Request $request, $id, $teamId)
	{
	    $logoName = '';

	    // логотип еще не загружен и не выбран
        if (empty($request->input('logo-uploaded')) && !$request->hasFile('logo')){
            $data = [
                'description' => trim($request->input('description')),
                'chat' => trim($request->input('chat')),
            ];
        }

        // логотип загружен и не выбран
        if (!empty($request->input('logo-uploaded')) && !$request->hasFile('logo')){
            $data = [
                'description' => trim($request->input('description')),
                'chat' => trim($request->input('chat')),
            ];
        }

        // логотип еще не загружен, но выбран
	    if (empty($request->input('logo-uploaded')) && $request->hasFile('logo')){
            $logoName = Service::createLogo($request->file('logo'), $teamId);

            $data = [
                'description' => trim($request->input('description')),
                'chat' => trim($request->input('chat')),
                'logo' => $logoName
            ];
	    }

        // логотип загружен, но выбран (обновить)
	    if (!empty($request->input('logo-uploaded')) && $request->hasFile('logo')){
            $logoName = Service::createLogo($request->file('logo'), $teamId);
            $data = [
                'description' => trim($request->input('description')),
                'chat' => trim($request->input('chat')),
                'logo' => $logoName
            ];
	    }

        try {
            $team = Team::where('id', $id)->update($data);
            return true;
        } catch (\Exception $e) {
            return false;
        }
	}

	// сохранить логотип команды
	public static function createLogo($file, $teamID)
	{
        try {

            $extension = $file->extension();
            $logoName = $teamID."_".time().".{$extension}";
            $source = "public/images/source/";
            $logo = "public/images/logo/";

            $image = $file;
            // проверить поворот картинок (jpg)
            if ($extension != 'png'){
                $exif = exif_read_data($file);
                if(!empty($exif['Orientation'])) {
                    switch($exif['Orientation']) {
                        case 8:
                            $image = Image::make($file)->rotate(90);
                            break;
                        case 3:
                            $image = Image::make($file)->rotate(180);
                            break;
                        case 6:
                            $image = Image::make($file)->rotate(-90);
                            break;
                    }
                }
            }

            // сохраняем оригинал
            Storage::putFileAs($source, $file, $logoName);

            // лого 300, сохраняем пропорции
            $imageResize = Image::make($image)->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg');

            Storage::put($logo.$logoName, $imageResize);
            $imageResize->destroy();
            return $logoName;
        } catch (\Exception $e) {
            return false;
        }
	}

	// связать команду и задачу
	public static function taskBinding(Request $request)
	{
		try {

			// пользователь в команде
			if (!empty(Auth::user()->team_id)){
				// внутренний номер задачи
				$id = trim($request->input('id'));
                // моя команда
				$myTeam = Team::find(Auth::user()->team_id);
				Team::where('id', $myTeam->id)->update(['task_id' => $id]);
				return true;
			}

            return false;

        } catch (\Exception $e) {
            return false;
        }
	}

    // приглашение в команду
    public static function teamInvitationCreate($invitedEmail, $teamId, $invitedUserId)
    {
        try {

            if (!empty(Auth::user()->id)){

                $data = [
                    'author_id' => Auth::user()->id, // кто пригасил
                    'team_id' => $teamId, // команда пригласившего
                    'email' => $invitedEmail, // email приглашенного
                    'status' => 1,
                    'invited_user_id' => $invitedUserId
                ];

                Invitation::create($data);

                if (empty($invitedUserId)) {

                    // self::sendMail('', $invitedEmail, 5);
                    // теперь DashaMail 060624
                    // команда

                    $team = Team::select('team')->find($teamId);
                    $subject = 'Приглашаем присоединиться к хакатону ЛЕТС ХАК';
                    $templateId = 3611877;
                    $message = $team->team;

                    //self::sendMailDasha('dmitry1203@gmail.com', $subject, $message, $templateId);
                    self::sendMailDasha($invitedEmail, $subject, $message, $templateId);

                }

                return true;
            }

        } catch (\Exception $e) {
            return false;
        }
    }


    // заявка в команду
    // js function sendTeamApplyForm(event, list)
    public static function teamApplicationCreate($teamId, $message)
    {
        try {

            if (!empty(Auth::user()->id)){

                // teamId - внешний номер

                $data = [
                    'user_id' => Auth::user()->id,
                    'team_id' => $teamId,
                    'message' => $message,
                    'status' => 1
                ];

                Application::create($data);
                return 'OK';
            }

        } catch (\Exception $e) {
            return 'FAIL';
        }
    }

    // принять заявку в команду
    public static function teamApplicationAccept($teamId, $applicationId)
    {
        try {

            if (!empty(Auth::user()->id)){

                // проверим, состоит ли пользователь уже в команде

                $application = Application::find($applicationId);

                // есть ли у пользователя из заявки заполненное поле team_id

                $userTeamId = User::find($application->user_id)->team_id;
                if (empty($userTeamId)){

                    // системный id команды, который добавим в запись пользователя
                    $id = Team::select('id')->where('team_id', $application->team_id)->get()[0]->id;
                    User::where('id', $application->user_id)->update(['team_id' => $id, 'join_team' => date('Y-m-d')]);

                    // изменить статус приглашения
                    Application::where('id', $application->id)->update(['status' => 2]);

                    // Application::where('id', $application->id)->delete();
                    return 1;
                } else {

                    // пользователь уже в команде, опоздали
                    // заявление удаляется автоматически

                    Application::where('id', $applicationId)->delete();
                    return 2;
                }
            }

        } catch (\Exception $e) {

            // что-то пошло не так
            return 0;
        }
    }

    // отклонить заявку в команду
    public static function teamApplicationDecline($applicationId)
    {
        try {

            if (!empty(Auth::user()->id)){

                $application = Application::find($applicationId);

                // изменить статус приглашения
                // Application::where('id', $application->id)->update(['status' => 3]);
                Application::where('id', $application->id)->delete();
                return true;

            }

        } catch (\Exception $e) {
            return false;
        }
    }

    // принять приглашение в команду
    // если игрок был в другой команде, то принимая приглашение, он переходит сразу
    public static function teamInvitationAccept($invitationId, $teamId)
    {
        try {
            if (!empty(Auth::user()->id)){

                // изменить статус приглашения и установить дату вступления в команду
                Invitation::where('id', $invitationId)->update(['status' => 2, 'join_team' => date('Y-m-d')]);

                // системный id команды, который добавим в запись пользователя
                $id = Team::select('id')->where('team_id', $teamId)->get()[0]->id;
                User::where('id', Auth::user()->id)->update(['team_id' => $id, 'join_team' => date('Y-m-d')]);

                return true;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

    // отклонить приглашение в команду
    public static function teamInvitationDecline($invitationId, $teamId)
    {
        try {
            if (!empty(Auth::user()->id)){
                Invitation::where('id', $invitationId)->update(['status' => 3]);
                //Invitation::where('id', $invitationId)->delete();
                return true;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }

////////// alias

	public static function alias($str)
	{
        $tr = array("а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e", "ж"=>"g", "з"=>"z", "и"=>"i", "й"=>"y", "к"=>"k", "л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f", "ы"=>"i", "э"=>"e", "ё"=>"yo", "ь"=>"", "ъ"=>"", "А"=>"A", "Б"=>"B", "В"=>"V", "Г"=>"G", "Д"=>"D", "Е"=>"E", "Ж"=>"G", "З"=>"Z", "И"=>"I", "Й"=>"Y", "К"=>"K", "Л"=>"L", "М"=>"M", "Н"=>"N", "О"=>"O", "П"=>"P", "Р"=>"R", "С"=>"S", "Т"=>"T", "У"=>"U", "Ф"=>"F", "Ы"=>"I", "Э"=>"E", "ё"=>"yo", "х"=>"h", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", "щ"=>"shch", "ъ"=>"", "ь"=>"", "ю"=>"yu", "я"=>"ya", "Ё"=>"YO", "Х"=>"H", "Ц"=>"TS", "Ч"=>"CH", "Ш"=>"SH", "Щ"=>"SHCH", "Ъ"=>"", "Ь"=>"", "Ю"=>"YU", "Я"=>"YA");
        $out = strtr($str, $tr);
        $out = mb_strtolower($out);
        // все пробелы заменить на один
        $out = preg_replace('!\s+!', '-', $out);
        $search = array(",", ".", "?", "!", "«", "»", '"');
        $out = str_replace($search, "", $out);
        return $out;
	}

////////// создать пароль //////////////////////////////////////////////////////////////////

    public static function randomValue ($length = 10){
       $possible='0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
       $value = "";
       while (strlen($value)<$length){
             $value.=substr($possible, mt_rand(0, strlen($possible)-1), 1);
       }
       return ($value);
    }

    public static function randomValueNumber ($length = 10){
       $possible='123456789';
       $value = "";
       while (strlen($value)<$length){
             $value.=substr($possible, mt_rand(0, strlen($possible)-1), 1);
       }
       return ($value);
    }

////////// отправка письма /////////////////////////////////////////////////////////////////


    public static function sendMail($body, $userEmail, $mailTemplate)
    {
        return Mail::to($userEmail)->send(new SendMail($body, $mailTemplate));
    }

    public function sendMailDasha ($userEmail, $subject, $message, $templateId)
    {

        try {

            $apiKey = env('DASHA_API_KEY');
            $from = 'hack@d-y.website';
            $replace='{"%BODY%":"'.$message.'"}';
            $url = "https://api.dashamail.com/?method=transactional.send&api_key={$apiKey}&to={$userEmail}&from_email={$from}&subject={$subject}&message={$templateId}&replace=".$replace;

            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => $url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
            ));

            $result = json_decode(curl_exec($curl));
            if ($result->response->msg->err_code == 0){
                // письмо отправлено
                return true;
            } else {
                return false;
            }

            curl_close($curl);

        } catch (\Exception $e) {
            return false;
        }

    }

}
?>
