<?php
/**
 * Criando formularios com os recursos do Yii framework
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\datePicker;
if ($tipo == 'cadastrar'){
    $radioList = Html::radioList('tipo_cliente',0,['fisico'=>'Cliente Físico','juridico'=>'Cliente Jurídico'],
    ['id'=>'tipo_cliente','style'=>'color:#1E90FF','class'=>'disabled']);
}
else{
    $radioList = '';
}
if(empty($fisico->co_cpf)){
    $mostrar_fisico = 'style="display: none"';
    $mostrar_juridico = '';
}
else{
    $mostrar_juridico = 'style="display: none"';
    $mostrar_fisico = '';
}
?>

<div class="cliente-form">
    
    <div class = "card card-default">
 
        <?php $form = ActiveForm::begin(['fieldConfig'=>['labelOptions'=>['style'=>'color:#1E90FF']],
        'errorSummaryCssClass'=>'alert alert-danger alert-dismissible',
        'encodeErrorSummary'=>false
        ]
        );?>
        <?php// $form->errorSummary($cliente, ['header'=>'Por favor, corrija os seguintes erros:<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', ]) ?>
        
        
        <div class="card-body">
            <div class="row">
                
                <div class="col-6"><?= $form->field($cliente,'no_cliente')->textInput(['style'=>'width: 100%;text-transform: uppercase;'])->error(false);?></div>
                <div class="col-2"><?= $form->field($cliente,'ic_situacao_cadastral')->dropDownList(['0'=>'Inativo','1'=>'Ativo'])->error(false);?></div>
                <div class="col-2"><?= $form->field($cliente,'dt_cadastro')->widget(datePicker::class)->error(false);?></div>
            
            </div><!--./row -->
            <div class="row" style="text-align:center;">
            <div class="col-6">
            <?=$radioList?>
            </div> 
            </div>
 
            <div id="fj-content" >

                
            </div>
           
            <!-- Dados de Contatos-->
            <div class="row">
                <div class="col-2"><?=$form->field($contato,'ic_tipo_contato')->dropDownList($contato->tipoContato);?></div>
                <div class="col-2"><?=$form->field($contato,'de_contato')->textInput();?></div>
            
            </div>
            <!-- Dados de Endereço -->
            <div class="row">
                <div class="col-2"><?=$form->field($endereco,'ic_tipo_endereco')->dropDownList($endereco->tipoEndereco,['prompt'=>'Selecione'])?></div>
                <div class="col-6"><?=$form->field($endereco,'no_logradouro')->textInput()?></div>
                <div class="col-1"><?=$form->field($endereco,'co_logradouro')->textInput()?></div><div class="col-2"><?=$form->field($endereco,'no_bairro')->textInput();?></div>
                                
            </div>
            <div class="row">
                <div class="col-2"><?=$form->field($endereco,'co_cep')->textInput()?></div>
                <div class="col-2"><?=$form->field($endereco,'ic_zona')->dropDownList($endereco->listaZonas,['prompt'=>'Selecione sua zona']);?></div>
                <div class="col-2"><?=$form->field($endereco,'no_cidade')->textInput()?></div>
                <div class="col-2"><?=$form->field($endereco,'sg_uf')->dropDownList($endereco->listaEstados,['prompt'=>'Escolha Estado']);?></div>
            </div>
            
           
        </div><!--./card-body --> 
        <div class="card-footer">
         <?= Html::submitButton('Salvar', ['class' => 'btn btn-info']) ?>
        
        </div>   
    
        <?php ActiveForm::end();?>
    </div>
</div>
<?php
$js = <<< JS

$("input:radio[name=tipo_cliente]").on("change",function () {

var val = $(this).val();

alert(val);

$.ajax({

type: "GET",
url: 'http://localhost/planeta_agua/web/cliente/cfj',
data: "tipo=" + val, 
success: function(data) {
      // data is ur summary
     $('#fj-content').html(data);
}
});



});
$(document).ready(function(){
    $(".d_juridico").hide();
    $(".d_fisico").show();
})      
      
JS;
$this->registerJs($js);
?>

