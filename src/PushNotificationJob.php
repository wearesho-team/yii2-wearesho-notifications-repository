<?php

namespace Wearesho\Notifications\Yii;

use Wearesho\Notifications;
use yii\base;
use yii\di;
use yii\queue;

/**
 * Class PushNotificationJob
 * @package Wearesho\Notifications\Yii
 */
class PushNotificationJob extends base\BaseObject implements queue\JobInterface
{
    /** @var Notifications\Notification */
    public $notification;

    /** @var array|string|Notifications\Push */
    public $repository = [
        'class' => Notifications\Push::class,
    ];

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        /** @var Notifications\Push $repository */
        $push = di\Instance::ensure($this->repository, Notifications\Push::class);
        $push->push($this->notification);
    }
}
