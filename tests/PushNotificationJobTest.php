<?php

namespace Wearesho\Notifications\Yii\Tests;

use GuzzleHttp\Client;
use Wearesho\Notifications;
use yii\queue\file\Queue;

/**
 * Class PushNotificationJobTest
 * @package Wearesho\Notifications\Yii\Tests
 */
class PushNotificationJobTest extends AbstractTestCase
{
    public function testPutIntoQueue(): void
    {
        $notification = new Notifications\Notification(
            1,
            'test message',
            ['a' => 'b',],
            'testType'
        );

        $job = new Notifications\Yii\PushNotificationJob([
            'notification' => $notification,
            'repository' => $repository = new Notifications\Yii\Tests\Mocks\RepositoryMock(
                new Notifications\Config('https://google.com'),
                new Client()
            ),
        ]);

        $job->execute(new Queue());

        $this->assertEquals($notification, $repository->getNotification());
    }
}
