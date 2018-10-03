<?php

namespace Wearesho\Notifications\Yii;

use Wearesho\Notifications;
use yii\base;

/**
 * Class Bootstrap
 * @package Wearesho\Notifications\Yii
 */
class Bootstrap implements base\BootstrapInterface
{

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->setAliases([
            '@Wearesho/Notifications' => '@vendor/wearesho-team/wearesho-notifications-repository/src',
        ]);

        \Yii::$container->set(
            Notifications\ConfigInterface::class,
            Notifications\EnvironmentConfig::class
        );
    }
}
