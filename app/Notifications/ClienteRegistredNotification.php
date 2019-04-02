<?php

namespace App\Notifications;

use App\Cliente;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClienteRegistredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $cliente;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente)
    {
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
        return (new MailMessage)
                    ->from(setting('site.email'), setting('site.title'))
                    ->subject('Bem vindo ' . $this->cliente->nome)
                    ->line('Ficamos muito feliz com seu cadastro. Aproveite para conferir todos os nosso produtos clicando no botão abaixo.')
                    ->action('Todos os produtos', route('shop'))
                    ->line('Obrigado pela confiança e preferência!')
                    ->salutation('Atenciosamente')
                    ->greeting('Olá ' . $this->cliente->nome);
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
