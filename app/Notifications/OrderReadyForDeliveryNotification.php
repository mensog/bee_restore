<?php

namespace App\Notifications;

use App\Channels\SmsAeroChannel;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class OrderReadyForDeliveryNotification extends OrderNotification
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
                    ->subject('Beeclub Заказ №' . $this->order->id . ' ожидает курьера' )
                    ->view('notifications.email', [
                        'order' => $this->order,
                        'titleNotification' => 'ожидает курьера',
                        'firstText' => new HtmlString('Заказ собран и ожидает курьера для вручения.<br>Отслеживайте заказ в разделе "Заказы" в'),
                        'route' => 'lk',
                        'linkName' => 'Личном кабинете.',
                        'status' => 'Забирается со склада',
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
            'status' => 'Заказ №' . $this->order->id . ' ожидает курьера' ,
            'notice' => 'Заказ собран и ожидает курьера для вручения.',
        ];
    }

    public function toSmsAero($notifiable)
    {
        $number = $this->order->takeNumber($this->order->phone);
        $text = 'Заказ №'. $this->order->id . ' собран и ожидает курьера для вручения.';
        return (new SmsAeroChannel($number, $text));
    }
}
