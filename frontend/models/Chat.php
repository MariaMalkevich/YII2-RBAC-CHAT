<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "chat".
 *
 * @property int $id
 * @property int|null $userId
 * @property string|null $message
 * @property string $updateDate
 */
class Chat extends \yii\db\ActiveRecord
{   
    
    public $userModel;
    public $userField;
    
    
    private $user;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId'], 'integer'],
            [['message'], 'string'],
            [['updateDate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'message' => 'Message',
            'updateDate' => 'Update Date',
        ];
    }
    
    
     /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
