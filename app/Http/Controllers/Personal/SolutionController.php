<?php
namespace App\Http\Controllers\Personal;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Solution;
use App\Models\Stage;
use App\Models\User;
use App\Models\Team;
// сервисный слой
use App\Http\Controllers\Services\Service;

class SolutionController extends Controller
{


    // доступ
    public function getAccessToSolutions()
    {

		$accessDenied = '';
		if(is_null(Auth()->user()->team_id)){
			$accessDenied = 'Доступ к разделу запрещен.<br>Вы не состоите в команде.';
		} else {
			$taskId = Team::select('task_id')
    			->where('id', Auth()->user()->team_id)
    			->first()
    			->task_id;

    		if (empty($taskId))	{
				$accessDenied = 'Доступ к разделу запрещен.<br>Ваша команда не выбрала задачу.';
    		}
		}

		return $accessDenied;
    }


    // этапы/решения
    public function solutions ()
    {

    	try {

    		$accessDenied = self::getAccessToSolutions();

    		if ($accessDenied == ''){

	    		$add = "(SELECT COUNT(id) FROM solutions WHERE solutions.stage_id = StageId AND solutions.team_id = ".Auth()->user()->team_id.") as count";

				$stages = Stage::select(
					'*',
					'stages.stage_id as StageId',
					DB::raw($add))
					->where('solution_required', 1)
					->get();

				// количество предарительных вариантов
				// условно считаем, что предварителтные варианты все, кроме последнего

				$countPreliminaryStages = count($stages) - 1;
				return view('personal.solutions', compact('stages','countPreliminaryStages'));

			} else {

				return view('personal.solutionsError', compact('accessDenied'));

			}

		} catch (\Exception $e) {
			return view('personal.error');
		}
	}


    // этап/решение
    public function solution ($eventId, $stageId)
    {

    	try {

    		$accessDenied = self::getAccessToSolutions();

    		if ($accessDenied == ''){

	    		$sendingIsAllowed = true;
				$stage = Stage::where('event_id', $eventId)
					->where('stage_id', $stageId)
					->first();
				if (is_null($stage)){
					return view('personal.error');
				}


				// кнопка Отправить недоступна
				if ($stage->id == 15 && date('Y-m-d H:i:s') > '2024-05-25 22:30:00'){
					$sendingIsAllowed = false;
				} elseif ($stage->id == 17 && date('Y-m-d H:i:s') > '2024-05-26 14:30:00') {
					$sendingIsAllowed = false;
				} elseif ($stage->id == 18 && date('Y-m-d H:i:s') > '2024-05-26 23:59:00') {
					$sendingIsAllowed = false;
				}


				//загружено ли решение по этому этапу?
				$solutionText = '';
				$solution = Solution::where('event_id', $eventId)
					->where('team_id', Auth()->user()->team_id)
					->where('stage_id', $stageId)
					->first();

				$onеTime = true;
				if (!is_null($solution)){
					$solutionText = trim($solution->solution);
					// решение вовремя
					if($stage->stage_date_end <= $solution->created_at){
						$onеTime = false;
					}
				}

				$token = base64_encode( $eventId . '&' . $stageId );
				return view('personal.stage', compact('eventId','stageId','stage','onеTime','solutionText','sendingIsAllowed','token'));

			} else {

				return view('personal.solutionsError', compact('accessDenied'));

			}

		} catch (\Exception $e) {
			return view('personal.error');
		}
	}

	// сохранить решение
    public function solutionStore (Request $request)
    {

		try {

			$token = substr($request->input('event-token'), 2, -2);
			$inputData = explode("&", base64_decode($token));
			$eventId = $inputData[0];
			$stageId = $inputData[1];
			$sendingIsAllowed = true;

			// проверяем входные параметры на корректность
			$stage = Stage::where('event_id', $eventId)
				->where('stage_id', $stageId)
				->first();

			if (is_null($stage)){
				return view('personal.error');
			}

/*
			// поздно сохранять
			if ($stage->id == 15 && date('Y-m-d H:i:s') > '2024-05-25 22:30:00'){
				$sendingIsAllowed = false;
			} elseif ($stage->id == 17 && date('Y-m-d H:i:s') > '2024-05-26 14:30:00') {
				$sendingIsAllowed = false;
			} elseif ($stage->id == 18 && date('Y-m-d H:i:s') > '2024-05-26 23:59:00') {
				$sendingIsAllowed = false;
			}
*/

			if ($sendingIsAllowed) {

		        $solution = Solution::where('event_id', $eventId)
					->where('stage_id', $stageId)
					->where('team_id', Auth()->user()->team_id)
					->first();

				if (is_null($solution)){

					// добавляем

					$data = [
			            'event_id' => $eventId,
			            'team_id' => Auth()->user()->team_id,
			            'stage_id' => $stageId,
			            'solution' => nl2br(strip_tags(trim($request->input('solution')))),
			        ];
					Solution::create($data);
					Team::where('id', Auth()->user()->team_id)->update( ['has_solutions' => 1] );

				} else {

					// обновляем

					$data = [
			            'solution' => nl2br(strip_tags(trim($request->input('solution')))),
			        ];

			        Solution::where('event_id', $eventId)
			        	->where('stage_id', $stageId)
			        	->where('team_id', Auth()->user()->team_id)
				        ->update($data);

				}

				$request->session()->flash('solutionInfo', 'Решение успешно загружено');
		        return redirect()->route('personal.solutions');

		    } else {

				// поздно сохранять
				$request->session()->flash('solutionInfo', 'Время для сохранения решения истекло');
				return redirect()->route('personal.solutions');

		    }

	    } catch (\Exception $e) {
			return view('personal.error');
		}
	}

}