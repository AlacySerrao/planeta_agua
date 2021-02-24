<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $endereco app\models\ClienteEndereco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-endereco-form">
   <div class="card card-info">
   <?php $form = ActiveForm::begin(['fieldConfig'=>['labelOptions'=>['style'=>'color:#1E90FF']],
        'errorSummaryCssClass'=>'alert alert-danger alert-dismissible',
        'encodeErrorSummary'=>false
        ]
        );?>
        <?= $form->errorSummary($model, ['header'=>'Por favor, corrija os seguintes erros:<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', ]) ?> 
        <div class="card-body">
            <div class="row">
                <div class="col-2"><?= $form->field($model, 'ic_situacao_endereco')->textInput() ?></div>
                <div class="col-2"><?= $form->field($model, 'ic_tipo_endereco')->textInput() ?></div>
                <div class="col-4"><?= $form->field($model, 'no_logradouro')->textInput(['maxlength' => true]) ?></div>
                <div class="col-2"><?= $form->field($model, 'co_logradouro')->textInput(['maxlength' => true]) ?></div>
                <div class="col-2"><?= $form->field($model, 'co_cep')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-3"><?= $form->field($model, 'no_bairro')->textInput(['maxlength' => true]) ?></div>
                <div class="col-3"><?= $form->field($model, 'no_complemento')->textInput(['maxlength' => true]) ?></div>
                <div class="col-2"><?= $form->field($model, 'sg_uf')->textInput(['maxlength' => true]) ?></div>
                <div class="col-3"><?= $form->field($model, 'no_cidade')->textInput(['maxlength' => true]) ?></div>
            </div>
            <div class="row">
                <div class="col-2"><?= $form->field($model, 'ic_zona')->textInput() ?></div>
                <div class="col-3"><?= $form->field($model, 'nu_cliente_longitude')->textInput() ?></div>
                <div class="col-3"><?= $form->field($model, 'nu_cliente_latitude')->textInput() ?></div>
            </div>
        </div><!--./card-bory-->
        <div class="card-footer">
            <center><?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?></center>
        </div><!--./card footer-->
        <?php ActiveForm::end();?>
    </div><!--./card card-info-->
    
</div>

