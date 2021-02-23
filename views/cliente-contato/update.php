<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContato */

$this->title = 'Update Cliente Contato: ' . $model->id_cliente_contato;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Contatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_contato, 'url' => ['view', 'id' => $model->id_cliente_contato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-contato-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
