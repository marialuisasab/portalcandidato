<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class adminPasswordResetNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            ->subject('Alterar Senha - Trabalhe Conosco [Bio Extratus]')
            ->greeting('Olá!')
            ->line('Você está recebendo este e-mail porque recebemos um pedido de redefinição de senha para sua conta.')
            ->action('Resetar Senha', 
                url(config('app.url').route('password.reset', 
                ['token'=>$this->token, 'user_type'=>request()->get('user_type')],
                false)))
            ->line('Se você não solicitou uma alteração da senha, nenhuma ação adicional é necessária.')
            ->salutation('Atencionamente, Equipe Bio Extratus.');
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
