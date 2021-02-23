<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteEndereco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-endereco-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cliente_fk')->textInput() ?>

    <?= $form->field($model, 'ic_tipo_endereco')->textInput() ?>

    <?= $form->field($model, 'ic_situacao_endereco')->textInput() ?>

    <?= $form->field($model, 'no_logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'co_logradouro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'co_cep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sg_uf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nu_cliente_latitude')->textInput() ?>

    <?= $form->field($model, 'nu_cliente_longitude')->textInput() ?>

    <?= $form->field($model, 'id_usuario_fk')->textInput() ?>

    <?= $form->field($model, 'dt_usuario')->textInput() ?>

    <?= $form->field($model, 'ic_zona')->textInput() ?>

    <?= $form->field($model, 'ic_excluido')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
