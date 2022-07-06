<?php

namespace Modules\Website\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title'         => $this->getTranslation('title', app()->getLocale()),
            'content'       => $this->getTranslation('content', app()->getLocale()),
            'created_at'    => $this->created_at,
        ];
    }
}
