<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_id
 * @property string $comment
 * @property string $user_agent
 * @property string $ip
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Users $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'comment', 'user_agent'], 'required'],
            [['user_id', 'type_id'], 'integer'],
            [['comment'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['user_agent'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type_id' => 'Type ID',
            'comment' => 'Comment',
            'user_agent' => 'User Agent',
            'ip' => 'Ip',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
