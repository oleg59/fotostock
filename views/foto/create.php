<?php

/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Загрузка фото';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-upload">
    <div class="row">
        <div class="col-xs-12">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>               
                
                <?= $form->field($model, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
                <p>
                    <small>Размер фото не долже привышать 2МБ</small>
                    <br>
                    <small>Не больше 10 изображений за раз</small>
                </p>

                <div id="load-indicator">
                    Идет загрузка...
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Загрузить фото', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>                

            <?php ActiveForm::end(); ?>
        </div>            
    </div>
</div>

<?php
    $script = "
        $('#w0').on('beforeSubmit', function (e) {
            $('#load-indicator').show();
        });
    ";
    $this->registerJs($script, yii\web\View::POS_READY);
?>