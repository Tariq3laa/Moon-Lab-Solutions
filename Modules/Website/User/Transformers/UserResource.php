<?php

namespace Modules\Website\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $method = request()->route()->getActionMethod();
        $result = [
            'id'            => $this->id,
            'name'          => $this->getTranslation('name', app()->getLocale()),
            'phone'         => $this->phone,
            'email'         => $this->email,
            'created_at'    => $this->created_at,
        ];
        if ($method == 'login' || $method == 'resetPassword') $result['access_token'] = $this->access_token;
        else if($method == 'profile') $result['articles'] = ArticleResource::collection($this->articles);
        return $result;
    }
}
