<?php

namespace App\Channels;

use App\Notifications\SmsAero;
use Illuminate\Notifications\Notification;

class SmsAeroChannel
{
    protected $number;
    protected $text;

    public function __construct($number = '', $text = '')
    {
        $this->number = $number;
        $this->text = $text;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSmsAero($notifiable);
        $smsaero = new SmsAero;
        $smsaero->send($message->number, $message->text, 'FREE SIGN');
    }
}
