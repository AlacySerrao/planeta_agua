<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteEnderecoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Enderecos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-endereco-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cliente Endereco', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cliente_endereco',
            'id_cliente_fk',
            'ic_tipo_endereco',
            'ic_situacao_endereco',
            'no_logradouro',
            //'co_logradouro',
            //'no_bairro',
            //'no_complemento',
            //'co_cep',
            //'no_cidade',
            //'sg_uf',
            //'nu_cliente_latitude',
            //'nu_cliente_longitude',
            //'id_usuario_fk',
            //'dt_usuario',
            //'ic_zona',
            //'ic_excluido:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
