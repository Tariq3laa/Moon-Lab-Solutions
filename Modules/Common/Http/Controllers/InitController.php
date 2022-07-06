<?php

namespace Modules\Common\Http\Controllers;

use Carbon\Carbon;
use F9Web\ApiResponseHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class InitController extends Controller
{
    use ApiResponseHelpers;
    public function __construct()
    {
        in_array(request('lang'), Config::get('locales.locales')) ? app()->setLocale(request('lang')) : app()->setLocale(env('LOCALE', 'en'));
        Carbon::setLocale('en');
        $this->setDefaultSuccessResponse([]);
    }
}
