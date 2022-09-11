<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'title' => $this->title,
            'body' => $this->body,
            'subject' => $this->subject->name,
            'subjectId' => $this->subject->id,
            'user' => $this->user->id,
        ];
    }
    public function with($request)
    {
        return ['status' => 'success'];
    }
}
