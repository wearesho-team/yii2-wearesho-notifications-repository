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

    /** @var array|string|Notifications\Repository */
    public $repository = [
        'class' => Notifications\Repository::class,
    ];

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        /** @var Notifications\Repository $repository */
        $repository = di\Instance::ensure($this->repository, Notifications\Repository::class);
        $repository->push($this->notification);
    }
}
