<?php

namespace App\Notifications;

class EmailNotification implements Notification
{
    public function __construct(protected string $email)
    {

    }

    public function send(string $title, string $message)
    {
        //mail notification logic here
        return $this->email . ' has been sent an email with the title of ' . $title . ' and a message of ' . $message;
    }
}