<?php

namespace Modules\Website\User\Http\Requests;

use Modules\Common\Rules\ArabicNameRule;
use Modules\Common\Rules\EnglishNameRule;
use Modules\Common\Http\Requests\ResponseShape;

class ArticleRequest extends ResponseShape
{
    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['article'] =  $this->route('article');
        return $data;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'PUT': 
            case 'POST': {
                    return [
                        'title.*'        => 'required|min:2',
                        'title.ar'       => ['required', new ArabicNameRule(true)],
                        'title.en'       => ['required', new EnglishNameRule(true)],
                        'content.*'      => 'required|min:2',
                        'content.ar'     => ['required', new ArabicNameRule(true)],
                        'content.en'     => ['required', new EnglishNameRule(true)],
                        'profile_id'     => 'required|exists:profiles,id',
                        'article'        => 'nullable|exists:articles,id'
                    ];
                }
            case 'DELETE': {
                    return [
                        'article'  => 'required|exists:articles,id'
                    ];
                }
            default:
                break;
        }
    }
    public function messages()
    {
        return [
            'title.required' => 'Article title is required',
        ];
    }
}
