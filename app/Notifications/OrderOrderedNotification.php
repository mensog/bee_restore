<?php

namespace App\Notifications;

use App\Channels\SmsAeroChannel;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class OrderOrderedNotification extends OrderNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
       parent::__construct($order);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Beeclub Собираем заказ №' . $this->order->id)
                    ->view('notifications.email', [
                        'order' => $this->order,
                        'uniqueTitleNotification' => 'Собираем заказ',
                        'firstText' => new HtmlString('Заказ уже собирается на складе и скоро будет передан курьеру. <br> Отслеживайте заказ в разделе «Заказы» в'),
                        'route' => 'lk',
                        'linkName' => 'Личном кабинете.',
                        'status' => 'Собирается',
                        'quantity' => $this->order->items()->pluck('quantity')->toArray(),
                        'style' => 'orange',
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'status' => 'Собираем №' . $this->order->id . ' заказ' ,
            'notice' => 'Заказ уже собирается на складе и скоро будет передан курьеру.',
        ];
    }

    public function toSmsAero($notifiable)
    {
        $number = $this->order->takeNumber($this->order->phone);
        $text = 'Заказ №'. $this->order->id . ' уже собирается на складе и скоро будет передан курьеру.';
        return (new SmsAeroChannel($number, $text));
    }
}
