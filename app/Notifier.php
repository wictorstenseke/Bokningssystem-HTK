<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notifier extends Model
{
    use Notifiable;

    protected $slack_webhook_url = 'https://hooks.slack.com/services/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';
    /**
    * Route notifications for the Slack channel.
    *
    * @return string
    */
   public function routeNotificationForSlack()
   {
       return $this->slack_webhook_url;
   }
}
