<?php

namespace Modules\Website\User\Http\Requests\Auth;

use Modules\Common\Http\Requests\ResponseShape;

class ResetPasswordRequest extends ResponseShape
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code'                  => 'required|exists:profiles,forget_password_code',
            'password'              => 'required|confirmed|min:6',
        ];
    }
}
