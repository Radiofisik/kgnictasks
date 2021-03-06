<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Организации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
	<?php   echo Html::a('Создать организацию', ['create'], ['class' => 'btn btn-success']) ;	?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fullname:ntext',
            'name',
            'reqid',
		
            [
			'attribute' => 'Директор',
            'format' => 'html',
            'value' => 'director.fio'
			],
			
			
			//'director.firstname'.'director.middlename'],
			[
            'attribute' => 'Сотрудники',
            'format' => 'html',
            'value' => function ($model) {
			$colcont=Html::a('Список', ['people/orglist','orgid'=>$model->id], ['class' => 'btn btn-success']) ;
                return $colcont;
            }
			
			
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
