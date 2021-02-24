<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteEndereco */

$this->title = $model->id_cliente_endereco;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Enderecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cliente-endereco-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cliente_endereco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cliente_endereco], [
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
            'id_cliente_endereco',
            'id_cliente_fk',
            'ic_tipo_endereco',
            'ic_situacao_endereco',
            'no_logradouro',
            'co_logradouro',
            'no_bairro',
            'no_complemento',
            'co_cep',
            'no_cidade',
            'sg_uf',
            'nu_cliente_latitude',
            'nu_cliente_longitude',
            'id_usuario_fk',
            'dt_usuario',
            'ic_zona',
            'ic_excluido:boolean',
        ],
    ]) ?>

</div>
