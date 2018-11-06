<?php

namespace Wearesho\Notifications\Yii;

use Wearesho\Notifications;
use yii\base;

/**
 * Class Bootstrap
 * @package Wearesho\Notifications\Yii
 */
class Bootstrap extends base\BaseObject implements base\BootstrapInterface
{
    /** @var array|string|Notifications\Push */
    public $push = [
        'class' => Notifications\Repository::class,
    ];

    /** @var array|string|Notifications\Authorize */
    public $authorize = [
        'class' => Notifications\Repository::class,
    ];

    /** @var array|string|Notifications\ConfigInterface */
    public $config = [
        'class' => Notifications\EnvironmentConfig::class,
    ];

    /**
     * @inheritdoc
     */
    public function bootstrap($app): void
    {
        $app->setAliases([
            '@Wearesho/Notifications' => '@vendor/wearesho-team/wearesho-notifications-repository/src',
        ]);

        \Yii::$container
            ->set(Notifications\Push::class, $this->push)
            ->set(Notifications\Authorize::class, $this->authorize)
            ->set(Notifications\ConfigInterface::class, $this->config);
    }
}
