<?php

namespace App\Providers;

use Modules\Common\Enums\UserTypeEnum;
use Illuminate\Support\ServiceProvider;
use Modules\Website\User\Entities\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            if ($notifiable instanceof User) {
                $user_type = UserTypeEnum::USER;
            }
            $url = $url.'&user_type='.$user_type;
            return (new MailMessage)->view('emails.common.send_verification', [
                'data' => [ 'redirect_link' => $url ]
            ])->subject('Activate Account '.env('APP_NAME', 'Moon-Lab-Solutions'))->action('Verify Email Address', $url);
        });
    }
}
