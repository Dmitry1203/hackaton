<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SolutionResource extends JsonResource
{
    public function toArray($request)
    {
        $content = [
            "stage_id" => $this->stage_id,
            "solution" => $this->solution,
            "created_at" => $this->_created_at,
        ];
        return response($content);
    }
}
