<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    public function toArray($request)
    {
        $content = [
            "user_id" => $this->user_id,
            "name" => $this->name,
            "surname" => $this->surname,
            "about_me" => $this->about_me,
            "avatar" => $this->avatar,
        ];
        return response($content);
    }
}
