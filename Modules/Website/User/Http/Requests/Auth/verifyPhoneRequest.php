<?php

namespace Modules\Website\User\Http\Requests\Auth;

use Modules\Common\Rules\PhoneNumberRule;
use Modules\Common\Http\Requests\ResponseShape;

class verifyPhoneRequest extends ResponseShape
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone'  => ['required', 'exists:profiles,phone', new PhoneNumberRule(), 'min:11'],
        ];
    }
}
