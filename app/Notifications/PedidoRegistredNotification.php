<?php

namespace App\Notifications;

use App\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PedidoRegistredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $pedido;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
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
        return (new MailMessage)
                    ->from(setting('site.email'), setting('site.title'))
                    ->subject('Pedido Registrado -  nº ' . $this->pedido->id)
                    ->greeting('Olá ' . $this->pedido->cliente->nome)
                    ->line('Recebemos seu pedido com sucesso. Em breve entraremos em contato com novos detalhes. Para acompanhar seu(s) pedido(s) clique no botão abaixo.')
                    ->action('Minha Conta', route('admin.home'))
                    ->line('Obrigado pela confiança e preferência!')
                    ->salutation('Atenciosamente!');
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
