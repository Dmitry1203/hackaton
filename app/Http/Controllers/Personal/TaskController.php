<?php
namespace App\Http\Controllers\Personal;
// мы в другом пространстве имен, поэтому надо добавиь
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB; ??
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// модель
use App\Models\Task;
use App\Models\Team;
// сервисный слой
use App\Http\Controllers\Services\Service;

class TaskController extends Controller
{

    // задачи 22.11.22
    public function tasks()
    {

		// userTeamInfo возвращает полную информацию о моей команде,
        // либо false если я не состою в команде
        // с параметром true - показать аватары
    	// _event() - id мероприятия

		$myTeamInfo = Service::userTeamInfo();

		if (!$myTeamInfo){

			// я не в команде
			$myTeam = 0;
			$otherTasks = Task::orderBy('name')
				->where('event_id', _event())
				->get();

		} else {

			// я в команде

			$myTeam = $myTeamInfo['myTeam'];

			// системный id задачи моей команды
			$myTeamTaskId = !empty($myTeam[0]) ? $myTeam[0]->TaskId : 0;

			if (empty($myTeamTaskId)){
				$otherTasks = Task::orderBy('name')
					->where('event_id', _event())
					->get();

			} else {

				// все задачи, кроме моей
				$otherTasks = Task::where('id', '!=', $myTeamTaskId)
					->where('event_id', _event())
					->orderBy('name')
					->get();
			}
	    }

	    return view('personal.tasks',compact('otherTasks', 'myTeam'));
	}

	// задачи для vue компонента
	public function tasksVue ()
	{
		$tasks = Task::select('id','task_id','name')->orderBy('name')->get();
		return response()->json($tasks);
	}

    // задачa 22.11.22
    public function task($taskId)
    {
		$task = Task::where('task_id', $taskId)->first();
		if (is_null($task)) {
			Abort(404);
		}

		// системный id передается в personal.task
		// и применяется в форме ВЫБРАТЬ ЗАДАЧУ
		$id = $task->id;

		// это моя задача?
		$myTask = false;
		$myTeamInfo = Service::userTeamInfo();
		$hasSolutions = $myTeamInfo['myTeam'][0]['has_solutions'];

		if(!empty($myTeamInfo['myTeam'][0])){
			// я в команде
			$myTeam = $myTeamInfo['myTeam'];
			if ($myTeam[0]->TaskExternalId == $taskId){
				// это моя задача
				$myTask = true;
			}
		}

        return view('personal.task', compact('task','myTask','id','hasSolutions'));
	}

    // связать задачу с командой 22.11.22
    public function taskBinding(Request $request)
    {
        if (Service::taskBinding($request)){
            return redirect()->route('personal.tasks');
        }
        return view('site.error');
	}


    // создать задачу, тест

    public function createTest()
    {
		$taskId = _helper_createID();
		$name = 'Комплексная феминизация в планировании строительных работ';
		$data = [
			'author_id' => 1,
			'task_id' => $taskId,
			'name' => $name,
		];
		Task::create($data);
	}

}
