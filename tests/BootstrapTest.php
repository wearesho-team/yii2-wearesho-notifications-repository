<?php

namespace Wearesho\Notifications\Yii\Tests;

use Wearesho\Notifications;

/**
 * Class BootstrapTest
 * @package Wearesho\Notifications\Yii\Tests
 */
class BootstrapTest extends AbstractTestCase
{
    public function testBootstrap(): void
    {
        $this->assertFalse(\Yii::$container->has(Notifications\ConfigInterface::class));
        $bootstrap = new Notifications\Yii\Bootstrap();
        $bootstrap->bootstrap(\Yii::$app);
        $this->assertTrue(\Yii::$container->has(Notifications\ConfigInterface::class));
        $this->assertStringEndsWith(
            'vendor/wearesho-team/wearesho-notifications-repository/src',
            \Yii::getAlias('@Wearesho/Notifications')
        );

        $this->assertTrue(\Yii::$container->has(Notifications\Push::class));
        $this->assertInstanceOf(
            Notifications\Repository::class,
            \Yii::$container->get(Notifications\Push::class)
        );

        $this->assertTrue(\Yii::$container->has(Notifications\Authorize::class));
        $this->assertInstanceOf(
            Notifications\Repository::class,
            \Yii::$container->get(Notifications\Authorize::class)
        );
    }
}
