<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;
//use App\Models\Vacation ;

class NotificationClass extends Notification
{
    use Queueable;

    protected $user;

    protected $vacation ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$vacation)
    {
        $this->user = $user ;
        $this->vacation = $vacation ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        return [

            'notificationData' => Carbon::now() ,
            'user'             => $this->user ,
            'vacation'         => $this->vacation
        ];
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
