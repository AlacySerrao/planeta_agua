<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContato */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-contato-form">
    <div class="card card-info">
        <?php $form = ActiveForm::begin(['fieldConfig'=>['labelOptions'=>['style'=>'color:#1E90FF']],
        'errorSummaryCssClass'=>'alert alert-danger alert-dismissible',
        'encodeErrorSummary'=>false
        ]
        );?>
        <?= $form->errorSummary($model, ['header'=>'Por favor, corrija os seguintes erros:<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', ]) ?>   
        <div class="card-body">
            <div class="row">
                <div class="col-4"><?= $form->field($model, 'ic_tipo_contato')->textInput() ?></div>
                <div class="col-4"><?= $form->field($model, 'de_contato')->textInput(['maxlength' => true]) ?></div>
            </div><!--./row-->
        
        </div><!--./card-body-->
        <div class="card-footer">
            <center><?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?></center>
        </div><!--./card footer-->
        <?php ActiveForm::end();?>
    </div><!--./card card-info--> 

</div>
