<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSistema */

$this->title = 'Update Usuario Sistema: ' . $model->id_usuario_sistema;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Sistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario_sistema, 'url' => ['view', 'id' => $model->id_usuario_sistema]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-sistema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
