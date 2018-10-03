<?php

namespace Wearesho\Notifications\Yii\Tests;

use GuzzleHttp\Client;
use Wearesho\Notifications\Config;
use Wearesho\Notifications\Notification;
use Wearesho\Notifications\Yii\PushNotificationJob;
use Wearesho\Notifications\Yii\Tests\Mocks\RepositoryMock;
use yii\queue\file\Queue;

/**
 * Class PushNotificationJobTest
 * @package Wearesho\Notifications\Yii\Tests
 */
class PushNotificationJobTest extends AbstractTestCase
{
    public function testPutIntoQueue(): void
    {
        $notification = new Notification(
            1,
            'test message',
            ['a' => 'b',],
            'testType'
        );

        $job = new PushNotificationJob([
            'notification' => $notification,
            'repository' => $repository = new RepositoryMock(
                new Config('https://google.com'),
                new Client()
            ),
        ]);

        $job->execute(new Queue());

        $this->assertEquals($notification, $repository->getNotification());
    }
}
