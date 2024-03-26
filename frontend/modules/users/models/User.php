<?php

namespace frontend\modules\users\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */

class User extends ActiveRecord implements Linkable
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token'], $fields['verification_token']);

        return $fields;
    }

    public function getLinks(): array
    {
        return [
            Link::REL_SELF => Url::to(['/users/'. $this->id], true),
        ];
    }

    /**
     * @throws Exception
     */
    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->auth_key = Yii::$app->security->generateRandomString();
            $this->access_token = Yii::$app->security->generateRandomString();
        }

        return parent::beforeValidate();
    }
}
