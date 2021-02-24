<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\ClienteEndereco;
use yii\helpers\Html;

$this->registerCss('body{background : #B0C4DE}');


?>
<div >
<div >
<div class="card card-info">
    <div class="card-header">
        <h4 class="card-title">Endereços</h4>
        <div class="card-tools">
        
        </div>
    </div>
    <div class="card-body table-responsive p-0">
      <?=
        GridView::widget([
            'dataProvider'=>$endereco,
            'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellpadding'=>'3'],
            'layout'=>"{items}",
            'columns'=> [
                ['header'=>'Tipo de Endereço',
                'format'=>'raw',
                'value'=>'tipoEndereco',
                ],
                [
                'header'=>'Endereço',
                'format'=>'raw',
                'value'=>function($model){return $model->no_logradouro.' - '.$model->co_logradouro;}
                ],
                [
                    'header'=>'CEP',
                    'format'=>'raw',
                    'value'=>'co_cep'
                ],
                [
                    'header'=>'Bairro',
                    'format'=>'raw',
                    'value'=>'no_bairro'
                ],
                [
                    'header'=>'Zona',
                    'format'=>'raw',
                    'value'=>'ic_zona'
                ],
                ['header'=>'Ação',
                'headerOptions'=>['styler'=>'width: 120px'],
                'format'=>'raw',
                'value'=> function($model){
                    return 
                    Html::a('<i class="fas fa-edit"></i>',['cliente-endereco/update','id'=>$model->id_cliente_endereco],['class'=>'modalButton'])."&nbsp;&nbsp;&nbsp;"
                    .Html::a('<i class="fas fa-trash-alt"></i>',
                    ['cliente-endereco/delete','id'=>$model->id_cliente_endereco],
                    ['data-method'=>'post',
                    'data-confirm'=>Yii::t('app','Deseja excluir endereço solicitado?')]);
                }
                ]
            ]
            
            ]);
      ?>  
    
    
    
    
    
    </div>
    <div class="card-footer"><center>
    <?=Html::a('Adcionar Endereço',['cliente-endereco/create','id'=>$cliente->id_cliente],['class'=>'btn btn-info modalButton']);?>
    </center></div>
</div><!--./card-info-->
</div><!--./col-6-->
<div>
    <div class="card card-info">
        <div class="card-header">
        <h4 class="card-title">Contatos</h4>      
        </div>
        <div class="card-body">
                <?=
                   GridView::widget([
                       'dataProvider'=>$contato,
                       'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellspacing'=>'3'],
                       'layout'=>"{items}",
                       'columns'=>[
                           [
                               'header'=>'Tipo Contato',
                               'format'=>'raw',
                               'value'=>'ic_tipo_contato'
                           ],
                           [
                               'header'=>'Contato',
                               'format'=>'raw',
                               'value'=>'de_contato'

                           ],
                           ['header'=>'Ação',
                            'headerOptions'=>['styler'=>'width: 120px'],
                            'format'=>'raw',
                            'value'=> function($model){
                            return 
                             Html::a('<i class="fas fa-edit"></i>',['cliente-contato/update','id'=>$model->id_cliente_contato],['class'=>'modalButton'])."&nbsp;&nbsp;&nbsp;"
                            .Html::a('<i class="fas fa-trash-alt"></i>',['cliente-contato/delete','id'=>$model->id_cliente_contato],
                            ['data-method'=>'post','data-confirm'=>Yii::t('app','Deseja excluir o contato solicitado?')]);
                }
                ]
                       ]
                   ])                 
                ?>
        
        </div>

        <div class="card-footer">
        <center><?=Html::a('Adcionar Contato',['cliente-contato/create','id'=>$cliente->id_cliente],['class'=>'btn btn-info modalButton']);?>
    </center>
        </div>
                
    </div>

</div><!--./col-4-->
</div><!--./row-->