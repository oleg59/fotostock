<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Foto */

$this->title = 'Радактировать фото';
$this->params['breadcrumbs'][] = ['label' => 'Все фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Фото', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Радактировать фото';
?>
<div class="foto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
