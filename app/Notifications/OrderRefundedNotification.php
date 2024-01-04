<?php

namespace App\Notifications;

use App\Channels\SmsAeroChannel;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class OrderRefundedNotification extends OrderNotification
{
    use Queueable;
    public $productReturn;
    /**
     * Create a new notification instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order, $productReturn)
    {
        parent::__construct($order);
        $this->productReturn = $productReturn;
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
            ->subject('Beeclub Заказ №' . $this->order->id . ' доставлен и частично возвращен' )
            ->view('notifications.email', [
                'order' => $this->order,
                'productReturn' => $this->productReturn,
                'titleNotification' => 'доставлен и частично возвращен',
                'firstText' => 'Товар арт.' . $this->productReturn->sku,
                'secondText' => 'в заказе №' . $this->order->id,
                'thirdText' => 'передан на возврат.',
                'status' => 'Доставлен',
                'secondStatus' => 'Возврат',
                'quantity' => $this->order->items()->pluck('quantity')->toArray(),
                'style' => 'green',
                'secondStyle' => 'gray',
            ]);
        //Доработать
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
            'status' => 'Заказ №' . $this->order->id . ' доставлен и частично возвращен' ,
            'notice' => 'Товар арт.' . $this->productReturn->sku . ' в заказе №' . $this->order->id . ' передан на возврат.',
        ];
    }

    public function toSmsAero($notifiable)
    {
        $number = $this->order->takeNumber($this->order->phone);
        $text = 'Заказ №'. $this->order->id . ' доставлен и частично возвращен. ' . 'Товар арт.' . $this->productReturn->sku . ' в заказе №' . $this->order->id . ' передан на возврат.';
        return (new SmsAeroChannel($number, $text));
    }
}
