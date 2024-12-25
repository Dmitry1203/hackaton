<?php
namespace App\Http\Controllers\Site;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// сервисный слой
use App\Http\Controllers\Services\Service;

class UserController extends Controller
{

    // вход
    public function login ()
    {
        $isAuth = Auth::check();
        return view('site.login', compact('isAuth'));
        /*
        if (Auth::check()) {
            return view('personal.profile');
        } else {
            return view('site.login');
        }
        */
	}

    // регистрация
    public function register ()
    {

        $isAuth = Auth::check();
        return view('site.register', compact('isAuth'));
        /*
        if (Auth::check()) {
            return view('personal.profile');
        } else {
            return view('site.register');
        }
        */
	}

    // пароль
    public function password ()
    {

        $isAuth = Auth::check();
        return view('site.password', compact('isAuth'));

    }

    // авторизация
    public function auth(Request $request)
    {
        $validate = Service::validateLoginUser($request);
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));

        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($credentials)) {

            if (empty(Auth::user()->is_sponsor)){

                $loginAt = date('Y-m-d H:i:s');
                User::where('id', Auth::user()->id)->update(['login_at' => $loginAt]);
                return redirect()->route('personal.index');

            } else {
                if (Auth::user()->is_sponsor == 1){
                    return redirect()->route('organizer.index');
                }
            }

        } else {
            return redirect()->route('login')->with(['authFail' => true]);
        }
    }

    // регистрация
    public function store(Request $request)
    {

        $userId = _helper_createID();
        $validate = Service::validateRegisterUser($request);
        $email = trim($request->input('email'));

        if (Service::createUser($request, $userId, $email)){

            //return redirect()->route('login')->with(['success' => 1, 'email' => $email]);
            $request->session()->flash('success', 1);
            return redirect()->route('success');

        } else {
            //return redirect()->route('success');
            return view('site.error');
        }

	}

    // успешная регистрация
    public function success()
    {

        if (Auth::check())
        {
            return view('personal.profile');
        } else {

            $isSuccess = session()->pull('success');
            if ($isSuccess == 1){
                return view('site.success');
            }  else {
                return redirect()->route('login');
            }

        }

    }

    // восстановление пароля
    public function passwordStore(Request $request)
    {

        if (Auth::check())
        {
            return view('personal.profile');

        } else {

            $validate = Service::validateEMail($request);
            $email = trim($request->input('email'));

            if (Service::createLinkForPasswordUpdate($email)){
                return redirect()->back()->with(['success' => 1]);
            } else {
                return redirect()->back()->with(['emailNotExist' => 1, 'email' => $email]);
            }

        }

    }

    // обновить пароль
    public function passwordUpdate($token)
    {

        if (Auth::check()) {

            return view('personal.profile');

        } else {

            $user = DB::table('users')
                ->select('id', 'email')
                ->where('remember_token', $token)
                ->first();

            if (!is_null($user)){
                $msg = Service::passwordUpdate($user->id, $user->email);
            } else {
                $msg = 'Ссылка для восстановления пароля некорректная или устарела.';
            }

        }

        return view('site.passwordUpdate', compact('msg'));
    }

}
