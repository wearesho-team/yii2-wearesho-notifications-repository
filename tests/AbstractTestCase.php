<?php

namespace Wearesho\Notifications\Yii\Tests;

use GuzzleHttp;
use PHPUnit\Framework\TestCase;
use yii\di\Container;
use yii\queue\file\Queue;
use yii\web;

/**
 * Class AbstractTestCase
 * @package Wearesho\Notifications\Yii\Tests
 * @internal
 */
abstract class AbstractTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        \Yii::$container = new Container();
        \Yii::$container->set(GuzzleHttp\ClientInterface::class, GuzzleHttp\Client::class);
        \Yii::$app = new web\Application([
            'id' => '1',
            'basePath' => dirname(__DIR__),
        ]);
    }
}
