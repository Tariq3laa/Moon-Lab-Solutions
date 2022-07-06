<?php

namespace Modules\Website\User\Http\Requests\Auth;

use Modules\Common\Rules\PhoneNumberRule;
use Modules\Common\Http\Requests\ResponseShape;

class LoginRequest extends ResponseShape
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'         => 'nullable|required_without:phone|email:rfc,dns|exists:profiles,email',
            'phone'         => ['nullable', 'required_without:email', new PhoneNumberRule(), 'exists:profiles,phone', 'min:11'],
            'password'      => 'required|min:6'
        ];
    }
}
