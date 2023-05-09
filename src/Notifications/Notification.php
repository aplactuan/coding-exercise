<?php

namespace App\Notifications;

interface Notification
{
    public function send(string $title, string $message);
}