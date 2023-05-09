<?php

use App\Notifications\EmailNotification;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase
{
    /** @test */
    public function it_can_send_notification_thru_email()
    {
        $mailNotification = new EmailNotification($email = 'me@test.com');

        $this->assertEquals(
            $email . ' has been sent an email with the title of title and a message of message',
            $mailNotification->send('title', 'message')
        );
    }
}
