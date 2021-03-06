# Yii2 Wearesho Notifications Repository
[![Build Status](https://travis-ci.org/wearesho-team/yii2-wearesho-notifications-repository.svg?branch=master)](https://travis-ci.org/wearesho-team/yii2-wearesho-notifications-repository)
[![codecov](https://codecov.io/gh/wearesho-team/yii2-wearesho-notifications-repository/branch/master/graph/badge.svg)](https://codecov.io/gh/wearesho-team/yii2-wearesho-notifications-repository)

This library helps to configure
[Wearesho Notifications Repository](https://github.com/wearesho-team/wearesho-notifications-repository)
in Yii2 application.

It contains:
- Bootstrap
- Job for yii2-queue for async notification pushing

## Installation

```bash
composer require wearesho-team/yii2-wearesho-notifications-repository
```

## Usage

Put [Bootstrap](./src/Bootstrap.php) to the bootstrap section in your application's config

```php
<?php

// config/main.php

return [
    'id' => '...',
    'basePath' => '...',
    'bootstrap' => [
        'notifications' => [
            'class' => Wearesho\Notifications\Yii\Bootstrap::class,
        ],
    ],
];

```

## Executing pushing notification in background

```php
<?php

/** @var Wearesho\Notifications\Notification $notification */

Yii::$app->queue->push(
    new Wearesho\Notifications\Yii\PushNotificationJob([
        'notification' => $notification,
    ])
);

```
