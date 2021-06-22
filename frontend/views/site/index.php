<?php

/* @var $model frontend\modules\user\models\create\CafeForm*/

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="container">
   <div class="row">	
       <?php foreach ($chat as $item):?>     
        <p><?php echo Html::encode($item->user_name); ?></p>
        <p><?php echo Html::encode($item->message); ?></p>
        <?php endforeach;?>
       
	<?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>			    
        <?php echo $form->field($model, 'message')->label('Опишите свою компанию')->textarea(['rows' => '6']); ?>
	<?php echo Html::submitButton('Создать',  ['class' => 'blue_submit']); ?>
	<?php ActiveForm::end(); ?>
   </div>
</div>