<?php

namespace yiiComponent\accessLog;

use Yii;

/**
 * 公共控制器
 *
 * Class CommonController
 *
 */
class CommonController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['log'] = [
            'class' => \yiiComponent\accessLog\AccessLogBehavior::className(),
                'switchOn' => Yii::$app->params['behaviorLog']['merchant'],
                'type' => 1,
                'userBehaviorModel' => '\yiiComponent\accessLog\model\UserBehaviorLog',
        ];

        return $behaviors;
    }

}