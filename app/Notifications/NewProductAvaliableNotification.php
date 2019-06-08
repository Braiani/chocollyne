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

    protected $product, $cliente, $update;

    /**
     * Create a new notification instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product, Cliente $cliente, bool $update)
    {
        $this->product = $product;
        $this->cliente = $cliente;
        $this->update = $update;
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
        $update = $this->update;

        $update ? $subject = 'Um produto foi atualizado!' : $subject = 'Um novo produto foi lançado!';

        return (new MailMessage)
                ->from(setting('site.email'), setting('site.title'))
                ->subject($subject)
                ->markdown('emails.newProduct', [
                    'produto' => $produto,
                    'cliente' => $cliente,
                    'atualizacao' => $update
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
