<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAuthNotification extends Notification implements shouldQueue
{
    use Queueable;

    public $admin;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $admin
     * @param $token
     */
    public function __construct($admin, $token)
    {
        //
        $this->admin = $admin;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return void
     */
    public function via($notifiable)
    {
        // return ['mail'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('دیلی شاپ تاییدیه ورود پنل مدیریت')
            ->from('admin_onlineshop@mail.ir')
            ->greeting('graphicshop.ir')
            ->line('Dear User')
            ->line('admin panel active token for admin user :')
            ->line("admin: $this->admin")
            ->line("active token : $this->token");
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
