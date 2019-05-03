<?php

namespace App\Notifications;

use App\Cliente;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewProductAvaliableNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $product, $cliente;

    /**
     * Create a new notification instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product, Cliente $cliente)
    {
        $this->product = $product;
        $this->cliente = $cliente;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $produto = $this->product;
        $cliente = $this->cliente;

        return (new MailMessage)
                ->from(setting('site.email'), setting('site.title'))
                ->subject('Um novo produto foi lançado!')
                ->markdown('emails.newProduct', [
                    'produto' => $produto,
                    'cliente' => $cliente
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
            //
        ];
    }
}
