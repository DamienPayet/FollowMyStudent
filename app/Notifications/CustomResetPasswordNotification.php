<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;

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
        $token = $this->token;
        return (new MailMessage)->view('vendor.notifications.reset', compact('token'))
            ->subject('Follow My Student - Réinitialisation mot de passe')
            ->line('Cet e-mail vous a été envoyé car vous avez demandé un changement de mot de passe pour votre compte.')
            ->action('Changer mon mot de passe', url('password/reset', $this->token))
            ->line('Ce lien de réinitialisation du mot de passe expirera dans 60 minutes.
                    Si vous n\'avez pas demandé de réinitialisation de mot de passe, aucune autre action n\'est nécessaire.');
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
