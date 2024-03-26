<?php

namespace frontend\modules\users;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
    }
}