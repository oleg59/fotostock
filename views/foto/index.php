<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все фото';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить фото', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(
            'Удалить фото',
            ['javascript: void(0);'],
            [
                'class' => 'btn btn-danger',
                'id' => 'delete-select',
                'data' => [
                    'confirm' => 'Вы точно хотите удалить эти фото?',
                    'method' => 'post',
                ]
            ]
        ) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'title',
            'description:ntext',
            [
                'attribute'=>'image',
                'format'=>'raw',
                'value' => function ($data) {
                    $url = Yii::$app->request->baseUrl . $data->image;
                    return Html::img($url, ['alt'=>'myImage','width'=>'200']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<?php
    $script = '
        $("#delete-select").on("click", function(e){
           var keys = $("#w0").yiiGridView("getSelectedRows");
           if(keys){
               $.ajax({
                 url: "'. \yii\helpers\Url::toRoute('delete-multiple') .'",
                 type: "POST",
                 data: {keys: keys}
               })
            }else{
                alert("Выберете фото!");
            }
            return false;
       });'; 
    $this->registerJs($script, yii\web\View::POS_READY);
?>
