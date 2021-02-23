<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteEndereco */

$this->title = 'Update Cliente Endereco: ' . $model->id_cliente_endereco;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Enderecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_endereco, 'url' => ['view', 'id' => $model->id_cliente_endereco]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-endereco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
