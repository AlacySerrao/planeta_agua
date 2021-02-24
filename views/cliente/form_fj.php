<?php 
use yii\widgets\ActiveForm;
$form = ActiveForm::begin();
if($tipo =='fisico' ):
    ?>
<div class="row">
    <div class="col-2"><?=$form->field($model,'co_cpf')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'co_rg')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'dt_nascimento')->textInput()->error(false);?></div>
</div>
<?php else:?>

<div class="row">
    <div class="col-6"><?=$form->field($model,'no_fantasia')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'co_cnpj')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'nu_ie_estadual')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'nu_ie_municipal')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($model,'dt_abertura')->textInput()->error(false);?></div>
</div>
<?php endif; 
ActiveForm::end();
?>