<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */

$this->title = "Фото";
$this->params['breadcrumbs'][] = ['label' => 'Все фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="foto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить это фото?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',            
            [
                'attribute'=>'image',
                'format'=>'raw',
                'value' => function ($data) {
                    $url = Yii::$app->request->baseUrl . $data->image;
                    return Html::img($url, ['alt'=>'myImage']);
                }
            ],
        ],
    ]) ?>

</div>
