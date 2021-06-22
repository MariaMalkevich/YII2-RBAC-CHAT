<?php

/* @var $model frontend\modules\user\models\create\CafeForm*/

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
 
<div class="container">
   <div class="row">
     <div class="col-md-2"></div>
     <div class="col-md-8 chat">
       <?php foreach ($chat as $item):?>
        <p class="name"><?php echo Html::encode($item->user_name); ?></p>
        <p><?php echo Html::encode($item->message); ?></p>
        <hr>
        <?php endforeach;?>
        
        <?php if (Yii::$app->user->can('accountAdmin'))  {
           echo('<a href="/user/business/cabinet" class="profile-link">
            </a>
            <div class="btn-group">
            <a type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="/user/business/cabinet">Аккаунт</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/user/business/logout">Выйти</a>
            </div>
            </div>
            '); 
           
         }?>
        
      </div>
     <div class="col-md-2"></div>
     </div>
    <div class="row message">
     <div class="col-md-2"></div>
     <div class="col-md-8">
      <?php  if (Yii::$app->user->isGuest) {
       }else {
        $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); 		    
        echo $form->field($model, 'message')->label('Cooбщение')->textarea(['rows' => '6']); 
	echo Html::submitButton('Отправить',  ['class' => 'blue_submit']); 
	ActiveForm::end(); 
       }
       ?>
     </div>
     <div class="col-md-2"></div>
   </div>
</div>

