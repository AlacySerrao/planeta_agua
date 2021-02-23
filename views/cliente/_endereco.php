<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\ClienteEndereco;
use yii\helpers\Html;

$this->registerCss('body{background : #B0C4DE}');
$data = new  ActiveDataProvider(['query'=>ClienteEndereco::find()->
where(['id_cliente_fk'=>$cliente->id_cliente])]);

?>

<div class="card card-info">
    <div class="card-header">
        <h4 class="card-title">Endereços</h4>
    </div>
    <div class="card-body">
      <?=
        GridView::widget([
            'dataProvider'=>$data,
            'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellpadding'=>'3'],
            'columns'=> [
                ['header'=>'Tipo de Endereço',
                'format'=>'raw',
                'value'=>'tipoEndereco',
                ],
                [
                'header'=>'Endereço',
                'format'=>'raw',
                'value'=>'no_logradouro'
                ],
                ['header'=>'Ação',
                'headerOptions'=>['styler'=>'width: 120px'],
                'format'=>'raw',
                'value'=> function($model){
                    return 
                    Html::a('<i class="fas fa-edit"></i>',['cliente-endereco/update','id'=>$model->id_cliente_endereco],['class'=>'modalButton'])."&nbsp;&nbsp;&nbsp;"
                    .Html::a('<i class="fas fa-trash-alt"></i>',['cliente-endereco/delete','id'=>$model->id_cliente_endereco]);
                }
                ]
            ]
            
            ]);
      ?>  
    
    
    
    
    
    </div>
    <div class="card-footer"></div>
</div>