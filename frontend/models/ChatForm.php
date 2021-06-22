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
   
   
    private $user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['message'], 'string'],
        ];
    }

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return boolean
     */
    public function save()
    {
        if ($this->validate()) {
            $post = new Chat();
            $post->user_name = $this->user->getUsername();
            $post->user_id = $this->user->getId();
            $post->message = $this->message;
            $post->created_at = time();

            return $post->save(false); 
            
        }
    }
}
