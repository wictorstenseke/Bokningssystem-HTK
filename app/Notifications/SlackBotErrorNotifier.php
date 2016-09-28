<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class SlackBotErrorNotifier extends Notification
{
    use Queueable;

    protected $request;
    protected $e;
    protected $errorFile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($request, $e)
    {
        $this->request = $request;
        $this->e = $e;
        $appDelimiter = explode('/app/', $this->e->getFile());
        $vendorDelimiter = explode('/vendor/', $this->e->getFile());
        if (count($appDelimiter) > 1){
            $this->errorFile = '...PROJEKTMAPP/app/' . $appDelimiter[1];
        } elseif (count($vendorDelimiter) > 1) {
            $this->errorFile = '...PROJEKTMAPP/vendor/' . $vendorDelimiter[1];
        }
        else{
            $this->errorFile = $this->e->getFile();
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
   public function toSlack($notifiable)
   {
       return (new SlackMessage)
           ->content('Server error '. config('app.url'))
           ->attachment(function ($attachment) {
                $attachment->title($this->e->getMessage())
                   ->fields([
                        'Exception' => get_class($this->e),
                        'Url:' => $this->request->url(),
                        'Tid:' => Carbon::now()->format('Y-m-d H:i:s'),
                        'Fil:' => $this->errorFile . ':'.$this->e->getLine(),
                    ]);
            });
   }
}
