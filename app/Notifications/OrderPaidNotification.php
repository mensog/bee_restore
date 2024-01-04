<?php

namespace App\Notifications;

use App\Channels\SmsAeroChannel;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class OrderPaidNotification extends OrderNotification
{
    use Queueable;

    protected $order;
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
     * @param mixed $notifiable
     * @param $order
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Beeclub Заказ №' . $this->order->id . ' успешно оплачен' )
                    ->view('notifications.email', [
                        'order' => $this->order,
                        'titleNotification' => 'оплачен',
                        'firstText' => new HtmlString('Мы уже начали работать над вашим заказом!<br>Отслеживайте заказ в разделе «Заказы» в'),
                        'route' => 'lk',
                        'linkName' => 'Личном кабинете.',
                        'status' => 'Оплачен',
                        'quantity' => $this->order->items()->pluck('quantity')->toArray(),
                        'style' => 'blue',
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
            'status' => 'Заказ №' . $this->order->id . ' оплачен' ,
            'notice' => 'Мы уже начали работать над вашим заказом!',
        ];
    }

    public function toSmsAero($notifiable)
    {
        $number = $this->order->takeNumber($this->order->phone);
        $text = 'Заказ №'. $this->order->id . ' оплачен. Мы уже начали работать над вашим заказом!';
        return (new SmsAeroChannel($number, $text));
    }
}
