<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;?>
<div class ="cliente-search">
<div class ="card-info">
<div class = "card-header"><h3 class ="card-title">CONSULTAR CLIENTE</h3></div>
    <?php
        $form = 
        ActiveForm::begin(
            ['action' => ['consultar'],
            'method' => 'get',
            'options' => ['class' =>'form-horizontal'],]);?>
        
       <div class="card-body"> <?=$form->field($model,'cpf',);?>
        
        <?=$form->field($model,'no_cliente');?>
        
        <?=$form->field($model,'cnpj');?>  
        
        <?=$form->field($model,'endereco');?>
        </div>  
    
    <div class = "form-class-group">
     <?=Html::submitButton('Buscar',['class'=>'btn btn-primary'])?>
    </div>
    <?php ActiveForm::end();?>
</div>
</div>
