<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CustomResetPassword extends Notification
{
    public $token;
    public $user;

    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(config('app.url').route('password.reset', $this->token, false));

        return (new MailMessage)
            ->subject(Lang::get('Reset Password Notification'))
            ->view('auth.email-reset', ['url' => $url, 'user' => $this->user]);
    }
}
