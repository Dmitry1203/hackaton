<?php
namespace App\View\Components;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Stage;
// сервисный слой
use App\Http\Controllers\Services\Service;

class Timeline extends Component
{

    public $stages;
    public $nextStage;
    public $nextStageShort;
    public $nextStageDescriptionShort;
    public $nextStageDateEnd;
    public $nextStageNum;

    public function __construct($eventId, $hasProfile, $hasTeam, $hasTask)
    {

        $stages = Stage::select(
            '*',
            'stages.stage_id as StageId',
            DB::raw('(SELECT COUNT(id) FROM solutions WHERE solutions.team_id = '.$hasTeam.' AND solutions.stage_id = StageId) as count'))
            ->where('event_id', $eventId)
            ->get();

        //$hasProfile = 2;
        //$hasTeam = 1;
        //$hasTask = 1;

        $isComplete = false;

        foreach ($stages as $key=>$stage) {

            $prevComplete = $isComplete;
            $isComplete = false;
            $isNext = false;
            $stageNum = $key + 1;

            // этапы, для которых не требуется загрузка решений

            if (empty($stage->solution_required)) {

                // профиль
                if ($stageNum == 1 && $hasProfile > 1){
                    $isComplete = true;
                } elseif ($stageNum == 1 && $hasProfile == 1){
                    $isNext = true;
                }

                // команда
                if ($stageNum == 2 && !empty($hasTeam)){
                    $isComplete = true;
                }

                // задача
                if ($stageNum == 3 && !empty($hasTask)){
                    $isComplete = true;
                }

            } else {

                // этапы, для которых необходимо загрузить решение
                if ($stage->count > 0){
                    $isComplete = true;
                }

            }

            if ($prevComplete != $isComplete){
                $isNext = true;
            }

            if ($isNext){
                $nextStageNum = $stageNum;
            }

            $data[$key]['id'] = $stage->id;
            $data[$key]['stage'] = $stage->stage;
            $data[$key]['decision_required'] = $stage->decision_required;
            $data[$key]['is_next'] = $isNext;
            $data[$key]['is_complete'] = $isComplete;
            $data[$key]['prev_complete'] = $prevComplete;

        }

        $this->stages = $data;

        // информация в раздел Следующее действие

        $this->nextStage = $stages[$nextStageNum-1]->stage;
        $this->nextStageShort = $stages[$nextStageNum-1]->stage_short;
        $this->nextStageDescriptionShort = $stages[$nextStageNum-1]->stage_description_short;
        $this->nextStageDateEnd = $stages[$nextStageNum-1]->stage_date_end;
        $this->nextStageNum = $nextStageNum;

    }

    public function render()
    {
        return view('components.timeline');
    }
}
