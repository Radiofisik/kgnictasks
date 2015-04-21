<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\People */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="people-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'middlename')->textInput(['maxlength' => 300]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'mphone')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => 1000]) ?>

    <?= $form->field($model, 'organizationid')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Organizations::find()->all(),'id','name'))
         ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
