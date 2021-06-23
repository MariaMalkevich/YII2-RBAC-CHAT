<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\Chat;

/**
 * ContactForm is the model behind the contact form.
 */
class ChatForm extends Model
{
    public $message;
    public $status;
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => '1'],
            [['message'], 'required'],
            [['message'], 'string'],
        ];
    }

//    /**
//     * @param User $user
//     */
//    public function __construct(User $user)
//    {
//        $this->user = $user;
//    }

    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {
            $post = new Chat();
            $post->user_name = Yii::$app->user->identity->username;
            $post->user_id = Yii::$app->user->identity->id;
            $post->message = $this->message;
            $post->status = $this->status;
            $post->created_at = time();

            return $post->save(false); 
            
        }
    }
}
