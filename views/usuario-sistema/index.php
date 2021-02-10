<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSistemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Sistemas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-sistema-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuario Sistema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
          <div class="col-md-10">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
             <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions'=> ['class' => 'table table-bordered table-hover dataTable dtr-inline'],
                'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_usuario_sistema',
                'id_grupo_usuario_fk',
                'no_usuario',
                'no_acesso',
                'co_senha',
                //'ic_permitir_acesso:boolean',
                //'dt_login',
                //'ic_exluido:boolean',

                ['class' => 'yii\grid\ActionColumn'],     
            
                ],
                ]); ?>
            </div>
        </div>
    </div>
                


</div>
