<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoUsuario */

$this->title = 'Update Grupo Usuario: ' . $model->id_grupo_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Grupo Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grupo_usuario, 'url' => ['view', 'id' => $model->id_grupo_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grupo-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
