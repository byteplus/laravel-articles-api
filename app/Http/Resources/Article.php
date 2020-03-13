<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // custom response
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'body' => $this->body,
        // ];
    }

    public function with($request) {
        return [
            'version' => '0.1',
            'author_url' => url('https://3design-bg.com')
        ];
    }
}
