<?php if($tipo == 'fisico'):?>
<div class="row">
    <div class="col-2"><?=$form->field($fisico,'co_cpf')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($fisico,'co_rg')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($fisico,'dt_nascimento')->textInput()->error(false);?></div>
</div>
<?php else:?>

<div class="row">
    <div class="col-6"><?=$form->field($juridico,'no_fantasia')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($juridico,'co_cnpj')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($juridico,'nu_ie_estadual')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($juridico,'nu_ie_municipal')->textInput()->error(false);?></div>
    <div class="col-2"><?=$form->field($juridico,'dt_abertura')->textInput()->error(false);?></div>
</div>
<?php endif;?>