<?php

namespace Modules\Website\User\Http\Requests\Auth;

use Modules\Common\Rules\ArabicNameRule;
use Modules\Common\Rules\EnglishNameRule;
use Modules\Common\Rules\PhoneNumberRule;
use Modules\Common\Http\Requests\ResponseShape;

class RegisterRequest extends ResponseShape
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name.*'        => 'required|min:2',
            'name.ar'       => ['required', new ArabicNameRule()],
            'name.en'       => ['required', new EnglishNameRule()],
            'email'         => 'nullable|required_without:phone|email:rfc,dns|unique:profiles,email',
            'phone'         => ['nullable', 'required_without:email', new PhoneNumberRule(), 'unique:profiles,phone', 'min:11'],
            'password'      => 'required|confirmed|min:6',
        ];
    }
}
