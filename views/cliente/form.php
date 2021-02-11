<?php
/**
 * Criando formularios com os recursos do Yii framework
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\datePicker;

?>

<div class = "cliente-form"><?= Html::a('ClienteFisico',['cliente/cadastrar']) ?>
    <?= Html::a('ClienteJuridico',['cliente/cadastrar/?tipoCliente=1']) ?>
 <div class = "row"> 
 
 
<div class="col-md-6">
    <div class="card card-primary">
    <div class = "card-header">
        <h3 class = "card-title"> Dados de Controle</h3>
    </div> <!-- /. card-header -->
 
<?php $form = ActiveForm::begin();?>

    <div class = "card-body">

    <?= $form->field($cliente,'no_cliente')->textInput(['style'=>'width: 100%;text-transform: uppercase;'])->label('Nome');?>
    <?= $form->field($cliente,'dt_cadastro')->widget(datePicker::class)->label('DATA CADASTRO');?>
    <?=date('d/m/Y',strtotime($cliente->dt_cadastro))?>
    <?= $form->field($cliente,'ic_situacao_cadastral')->dropDownList(['0'=>'Inativo','1'=>'Ativo'])->label('Situação Cadastral');?>
    </div><!-- /. card-body-->
    </div><!-- /. card card-primary -->
</div> <!-- /.col-md-8 -->


     <!--Cliente Fisico -->

    <?php
        if (isset($fisico)){
            ?>
    <div class="col-md-6">
    <div class="card card-primary">
    <div class = "card-header">
        <h3 class = "card-title"> Dados de Pessoa Física</h3>
    </div> <!-- /. card-header -->
    <div class = "card-body">
    <?php        
            echo $form->field($fisico,'co_cpf')->textInput()->label('CPF');
            echo $form->field($fisico,'co_rg')->textInput()->label('RG');
            echo $form->field($fisico,'dt_nascimento')->textInput()->label('DATA NASCIMENTO');
       ?>
      </div><!-- /. card-body-->
    </div><!-- /. card card-primary -->
</div> <!-- /.col-md-8 -->
       <?php }
    ?>

      
    
    <!--Cliente Juridico -->

    <?php 
        if(isset($juridico)){
    ?>
    <div class="col-md-6">
    <div class="card card-primary">
    <div class = "card-header">
        <h3 class = "card-title"> Dados de Pessoa Juridica</h3>
    </div> <!-- /. card-header -->
    <div class = "card-body">
    <?php
           echo $form->field($juridico,'no_fantasia')->textInput()->label('NOME FANTASIA');
           echo $form->field($juridico,'co_cnpj')->textInput()->label('CNPJ');
           echo $form->field($juridico,'nu_ie_estadual')->textInput()->label('NÚMERO DE INSCRIÇÃO ESTADUAL');
           echo $form->field($juridico,'nu_ie_municipal')->textInput()->label('NÚMERO DE INSCRIÇÃO MUNICIPAL');
           echo $form->field($juridico,'dt_abertura')->textInput()->label('DATA DE ABERTURA');
        ?>
        </div><!-- /. card-body-->
        </div><!-- /. card card-primary -->
        </div> <!-- /.col-md-8 -->
      <?php  }
    ?>
</div>  <!-- /. row -->

    <?=$form->field($contato,'ic_tipo_contato')->dropDownList($contato->tipoContato)->label('TIPO TELEFONE');?>
    <?=$form->field($contato,'de_contato')->textInput()->label('TELEFONE');?>
    <!-- Dados de Endereço -->
    <div class="col-md-8">
    <div class="card card-primary">
    <div class = "card-header">
        <h3 class = "card-title"> Dados de Endereço
        </h3>
    </div> <!-- /. card-header -->
    <div class = "card-body">

    <?=$form->field($endereco,'ic_tipo_endereco')->dropDownList($endereco->tipoEndereco,['prompt'=>'Selecione seu tipo endereço'])->label('TIPO DE ENDEREÇO');?>
    <?=$form->field($endereco,'no_logradouro')->textInput()->label('LOGRADOURO');?>
    <?=$form->field($endereco,'co_logradouro')->textInput()->label('CÓDIGO LOGRADOURO');?>
    <?=$form->field($endereco,'no_bairro')->textInput()->label('BAIRRO');?>
    <?=$form->field($endereco,'ic_zona')->dropDownList($endereco->listaZonas,['prompt'=>'Selecione sua zona'])->label('ZONA');?>
    <?=$form->field($endereco,'sg_uf')->dropDownList($endereco->listaEstados,['prompt'=>'Escolha Estado'])->label('UF');?>
    <?=$form->field($endereco,'no_cidade')->textInput()->label('CIDADE');?>

    </div><!-- /. card-body-->
        </div><!-- /. card card-primary -->
        </div> <!-- /.col-md-8 -->
     <!-- /. Dados de Endereço -->   
    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end();?>
</div>

<!--
$js = <<< JS
$(document).ready(function () {
$(document.body).on("change", "#tipo_pessoa", function () {

var val = $("#tipo_pessoa").val();


if(val == "pf") {
$(".PJuridico").hide();
$(".PFisico").show();
} else{
$(".PJuridico").show();
$(".PFisico").hide();

} 
});
});      
      
JS;
$this->registerJs($js);
 -->