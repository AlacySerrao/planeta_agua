<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContato */

$this->title = 'Create Cliente Contato';
$this->params['breadcrumbs'][] = ['label' => 'Cliente Contatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-contato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
