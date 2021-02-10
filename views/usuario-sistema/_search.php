<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSistemaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-sistema-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario_sistema') ?>

    <?= $form->field($model, 'id_grupo_usuario_fk') ?>

    <?= $form->field($model, 'no_usuario') ?>

    <?= $form->field($model, 'no_acesso') ?>

    <?= $form->field($model, 'co_senha') ?>

    <?php // echo $form->field($model, 'ic_permitir_acesso')->checkbox() ?>

    <?php // echo $form->field($model, 'dt_login') ?>

    <?php // echo $form->field($model, 'ic_exluido')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
