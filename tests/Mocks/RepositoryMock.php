<?php

namespace Wearesho\Notifications\Yii\Tests\Mocks;

use Wearesho\Notifications\Notification;
use Wearesho\Notifications\Repository;

/**
 * Class RepositoryMock
 * @package Wearesho\Notifications\Yii\Tests\Mocks
 */
class RepositoryMock extends Repository
{
    protected $notification;

    public function push(Notification $notification): void
    {
        $this->notification = $notification;
    }

    public function getNotification(): ?Notification
    {
        return $this->notification;
    }
}
