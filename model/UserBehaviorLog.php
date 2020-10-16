<?php

namespace yiiComponent\accessLog\model;

use Yii;

/**
 * This is the model class for table "{{%user_behavior_log}}".
 *
 * @property string $id
 * @property string $user_id 用户ID
 * @property int $is_trash 类型：1=>用户端，2=>管理员端
 * @property string $absolute_url 完整路由
 * @property string $module 模块
 * @property string $controller 控制器
 * @property string $action 操作
 * @property string $route 路由
 * @property string $method 方法
 * @property string $user_agent User-agent
 * @property string $origin Origin
 * @property string $host Host
 * @property string $headers 请求头（json）
 * @property string $params 请求参数（json）
 * @property string $body 请求体（json）
 * @property string $authorization 身份认证
 * @property string $request_ip 请求IP
 * @property string $created_at 创建时间
 */
class UserBehaviorLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_behavior_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'is_trash'], 'integer', 'min' => 0],
            [['headers', 'params', 'body'], 'required'],
            [['headers', 'params', 'body'], 'string'],
            [['created_at'], 'datetime', 'format' => 'yyyy-MM-dd HH:mm:ss'],
            [['absolute_url', 'route', 'user_agent', 'origin', 'host', 'authorization'], 'string', 'max' => 255],
            [['module'], 'string', 'max' => 64],
            [['controller', 'action'], 'string', 'max' => 32],
            [['method'], 'string', 'max' => 8],
            [['request_ip'], 'string', 'max' => 16],
            [['user_id'], 'default', 'value' => 0],
            [['is_trash'], 'default', 'value' => 1],
            [['absolute_url', 'module', 'controller', 'action', 'route', 'method', 'user_agent', 'origin', 'host', 'headers', 'params', 'body', 'authorization', 'request_ip'], 'default', 'value' => ''],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'is_trash' => Yii::t('app', '类型：1=>用户端，2=>管理员端'),
            'absolute_url' => Yii::t('app', '完整路由'),
            'module' => Yii::t('app', '模块'),
            'controller' => Yii::t('app', '控制器'),
            'action' => Yii::t('app', '操作'),
            'route' => Yii::t('app', '路由'),
            'method' => Yii::t('app', '方法'),
            'user_agent' => Yii::t('app', 'User-agent'),
            'origin' => Yii::t('app', 'Origin'),
            'host' => Yii::t('app', 'Host'),
            'headers' => Yii::t('app', '请求头（json）'),
            'params' => Yii::t('app', '请求参数（json）'),
            'body' => Yii::t('app', '请求体（json）'),
            'authorization' => Yii::t('app', '身份认证'),
            'request_ip' => Yii::t('app', '请求IP'),
            'created_at' => Yii::t('app', '创建时间'),
        ];
    }
}
