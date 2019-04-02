<?php

namespace App\Notifications;

use App\Pedido;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PedidoRegistredAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $pedido;

    protected $admin;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido, User $user)
    {
        $this->pedido = $pedido;
        $this->admin = $user;
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
                    ->greeting('Olá ' . $this->admin->name)
                    ->line('Recebemos um novo pedido no site. Para verificar o pedido, clique no botão abaixo.')
                    ->action('Pedido Recebido', route('voyager.pedidos.show', $this->pedido->id))
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
