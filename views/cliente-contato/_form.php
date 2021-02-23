<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-contato-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ic_tipo_contato')->textInput() ?>

    <?= $form->field($model, 'de_contato')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
