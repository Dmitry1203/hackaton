<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        $content = [
            "id" => $this->id,
            "team_id" => $this->team_id,
            "task_id" => $this->task_id,
            "team" => $this->team,
            "description" => $this->description,
            "solutions" => $this->has_solutions,
            "logo" => $this->logo,
            "created_at" => $this->created_at,
            "TaskId" => $this->TaskId,
            "Task" => $this->Task,
        ];
        return response($content);
    }
}
