<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteContatoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Contatos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-contato-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cliente Contato', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cliente_contato',
            'id_cliente_fk',
            'ic_tipo_contato',
            'de_contato',
            'no_contato',
            //'ic_excuido:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
