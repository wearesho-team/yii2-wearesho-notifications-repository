<?php

namespace Wearesho\Notifications\Yii\Tests;

use Wearesho\Notifications\ConfigInterface;
use Wearesho\Notifications\Yii\Bootstrap;

/**
 * Class BootstrapTest
 * @package Wearesho\Notifications\Yii\Tests
 */
class BootstrapTest extends AbstractTestCase
{
    public function testBootstrap(): void
    {
        $this->assertFalse(\Yii::$container->has(ConfigInterface::class));
        $bootstrap = new Bootstrap();
        $bootstrap->bootstrap(\Yii::$app);
        $this->assertTrue(\Yii::$container->has(ConfigInterface::class));
        $this->assertStringEndsWith(
            'vendor/wearesho-team/wearesho-notifications-repository/src',
            \Yii::getAlias('@Wearesho/Notifications')
        );
    }
}
