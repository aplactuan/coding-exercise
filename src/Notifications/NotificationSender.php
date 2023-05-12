<?php

namespace App\Notifications;

class NotificationSender
{
    public function __construct(protected $notification)
    {

    }
    public function send($title, $message)
    {
        return $this->notification->send($title, $message);
    }
}