<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    public function toArray($request)
    {
        $content = [
            "status" => "SUCCESS",
        ];
        return response($content);
    }
}
