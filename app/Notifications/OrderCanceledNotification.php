<?php

namespace App\Notifications;

use App\Channels\SmsAeroChannel;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class OrderCanceledNotification extends OrderNotification
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
                    ->subject('Beeclub Заказ №' . $this->order->id . ' не оплачен' )
                    ->view('notifications.email', [
                        'order' => $this->order,
                        'titleNotification' => 'не оплачен',
                        'firstText' => new HtmlString('Попробуйте оплатить заказ повторно.<br>Перейдите по ссылке для повторной оплаты'),
                        'route' => 'place_order',
                        'linkName' => 'ссылка.',
                        'status' => 'Ожидает оплату',
                        'quantity' => $this->order->items()->pluck('quantity')->toArray(),
                        'style' => 'gray',
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
            'status' => 'Неудачная оплата',
            'notice' => 'Попробуйте оплатить заказ повторно.',
        ];
    }

    public function toSmsAero($notifiable)
    {
        $number = $this->order->takeNumber($this->order->phone);
        $text = 'Заказ №'. $this->order->id . ' не оплачен. Попробуйте оплатить заказ повторно.';
        return (new SmsAeroChannel($number, $text));
    }
}
