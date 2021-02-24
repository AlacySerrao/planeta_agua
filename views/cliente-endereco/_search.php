<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteEnderecoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-endereco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cliente_endereco') ?>

    <?= $form->field($model, 'id_cliente_fk') ?>

    <?= $form->field($model, 'ic_tipo_endereco') ?>

    <?= $form->field($model, 'ic_situacao_endereco') ?>

    <?= $form->field($model, 'no_logradouro') ?>

    <?php // echo $form->field($model, 'co_logradouro') ?>

    <?php // echo $form->field($model, 'no_bairro') ?>

    <?php // echo $form->field($model, 'no_complemento') ?>

    <?php // echo $form->field($model, 'co_cep') ?>

    <?php // echo $form->field($model, 'no_cidade') ?>

    <?php // echo $form->field($model, 'sg_uf') ?>

    <?php // echo $form->field($model, 'nu_cliente_latitude') ?>

    <?php // echo $form->field($model, 'nu_cliente_longitude') ?>

    <?php // echo $form->field($model, 'id_usuario_fk') ?>

    <?php // echo $form->field($model, 'dt_usuario') ?>

    <?php // echo $form->field($model, 'ic_zona') ?>

    <?php // echo $form->field($model, 'ic_excluido')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
