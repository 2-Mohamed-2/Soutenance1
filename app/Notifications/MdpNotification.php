<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MdpNotification extends Notification
{
    use Queueable;
    protected $password;
    protected $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($password, $name)
    {
        $this->password = $password;
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
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

     
        return (new MailMessage)->subject('Création de compte')
        ->line('Bonjour '.$notifiable->name. ', c\'est l\'equipe de Coms_ML. Vous avez bien été enregistré sur notre site !')
        ->line('Votre mot de passe par defaut est : '.$this->password)
        ->line('Vous pouvez le modifier dès votre prémière connexion.')
        ->view('vendor.notifications.test');

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
