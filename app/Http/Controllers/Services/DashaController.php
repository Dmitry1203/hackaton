<?php
namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Services\Service;
use App\Models\User;

class DashaController extends Controller
{

    public function createMailList ()
    {
        $subject = 'Регистрация для участия в хакатоне «ЛЕТС ХАК»';
        $templateId = 3602008;
        $mailList = User::select('id','email')
            ->where('is_password_sent', 0)
            ->take(10)
            ->get();

        self::sendMailsRegister($mailList, $subject, $templateId);
    }

    public function sendMailsRegister ($mailList, $subject, $templateId)
    {

        try {

            $apiKey = env('DASHA_API_KEY');
            $from = 'hack@d-y.website';
            $curl = curl_init();

            foreach($mailList as $user){
                $password = Service::randomValue();
                //$to = $user->email;
                $to = 'dmitry1203@gmail.com,ivan.kluev.work@gmail.com,v@articms.com';
                $replace='{"%PASS%":"'.$password.'"}';
                $url = "https://api.dashamail.com/?method=transactional.send&api_key={$apiKey}&to={$to}&from_email={$from}&subject={$subject}&message={$templateId}&replace=".$replace;

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
                    // $result->response->data->transaction_id;
                    $data = [
                        'password' => Hash::make($password),
                        'is_password_sent' => 1,
                        'password_sent_status' => 0
                    ];
                } else {
                    $data = [
                        'password_sent_status' => $result->response->msg->err_code
                    ];
                }

                User::where('id', $user->id)->update($data);
                echo "Отправлен пароль для пользователя с Id " . $user->id . "<br>";

            }
            curl_close($curl);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
