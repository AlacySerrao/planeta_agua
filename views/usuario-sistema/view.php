<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSistema */

$this->title = $model->id_usuario_sistema;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Sistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuario-sistema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_usuario_sistema], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_usuario_sistema], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario_sistema',
            'id_grupo_usuario_fk',
            'no_usuario',
            'no_acesso',
            'co_senha',
            'ic_permitir_acesso:boolean',
            'dt_login',
            'ic_exluido:boolean',
        ],
    ]) ?>

</div>
