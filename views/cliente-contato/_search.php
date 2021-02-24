<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContatoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-contato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente_contato') ?>

    <?= $form->field($model, 'id_cliente_fk') ?>

    <?= $form->field($model, 'ic_tipo_contato') ?>

    <?= $form->field($model, 'de_contato') ?>

    <?= $form->field($model, 'no_contato') ?>

    <?php // echo $form->field($model, 'ic_excuido')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
