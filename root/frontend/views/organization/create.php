<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Organizations */

$this->title = 'Создание организации';
$this->params['breadcrumbs'][] = ['label' => 'Огранизации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
