<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h5><?= Html::encode($model->no_logradouro) ?></h5>

    <?= HtmlPurifier::process($model->no_bairro) ?>    
</div>