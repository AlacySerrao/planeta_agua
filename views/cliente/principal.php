<?php

use app\models\ClienteContato;
use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use SebastianBergmann\CodeCoverage\Report\Xml\Method;
use yii\bootstrap4\ActiveForm;

Modal::begin([
    'title' => 'Consultar Cliente',
    'size' => 'modal-xl',
    'id' => 'modal'
]);
echo"<div id='modalconteudo'></div>";
Modal::end();


?>
<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-2">
            <div class="info-box shadow-sm">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CLIENTES</span>
                
              </div>
              <!-- /.info-box-content -->
            </div>   
            </div>
            <div class="col-sm-6"><?=Html::a('Novo Cliente',['cliente/create'],['class'=>'btn btn-info']);?></div>
        
        </div>
        
        
    </div><!--/.card-header-->
    <div class="card-body">
        <div class="row">
                
        </div><!--/.row-->
    </div><!--/.card-body-->
</div><!--/.card card-default-->

<div class="row">

          <div class="col-12">
         
            <div class="card">
            <?php $form = ActiveForm::begin([
              'action'=>['consultar'],
               'method'=>'get',
               'fieldConfig'=>[
                   'template'=>"{input}",
                   'options'=>['tag'=>false]
                   ]
               ]);?>
              <div class="card-header">
                              
                <div class="card-tools">
                
                  <div class="input-group" style="width: 950px;">
                        <?=               
                        $form->field($seachModel,'busca')->label(false)->
                        textInput(['class'=>'form-control form-control-lg','placeholder'=>'Exibir/Buscar Cliente']);?>
                                                       
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    
                    <div class="input-group-append">
                        <?=HTML::a('<i class="fas fa-filter"></i>',['cliente/search'],['class'=>'btn btn-default modalButton']);?>
                    </div>
                </div>
            </div>
                
        </div>
        <?php ActiveForm::end();?>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

<?=GridView::widget([
    'dataProvider'=>$dataProvider,
        'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellpadding'=>'3'],
        'layout'=>"{items}\n<div class='mx-auto'>{pager}</div>",
       'columns'=>[
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            // uncomment below and comment detail if you need to render via ajax
            // 'detailUrl' => Url::to(['/site/book-details']),
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_teste', ['cliente' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'], 
            'expandOneOnly' => true
        ],
        
        ['header'=> 'código',
        'headerOptions'=>['style'=>'text-aling: center; widht: 100px'],
        'format'=>'raw',
        'value' => function($model){
            $codigo = str_pad($model->id_cliente,5,0,STR_PAD_LEFT); 
            return HTML::a($codigo,['cliente/visualizar','id'=>$model->id_cliente]);
        },
        ],
        ['header'=>'nome',
            'headerOptions'=>['style'=>'widht:250px'],
            'contentOptions'=>['style'=>'widht:250px'],
            'value'=>'no_cliente',
            'format' => 'raw',
            'value' => function ($model){
                return Html::a($model->no_cliente,['cliente/visualizar','id'=>$model->id_cliente]);
            },
    ],
        ['header'=>'CPF/CNPJ',
          'format'=>'raw',
            'value'=>function($model){
                if($model->clienteFisico){
                    return $model->clienteFisico['co_cpf'];
                }
                else{
                    return $model->clienteJuridico['co_cnpj'];
                }
            }
        ],
        ['header'=>'Endereço',
            'format' => 'raw',
            'value' => function($model){
                if ($model->clienteEndereco){
                    foreach ($model->clienteEndereco as $endereco){
                        if($endereco['ic_tipo_endereco']=='1'){
                            $value = $endereco['no_logradouro'].' - '.$endereco['no_bairro'].'<br>';
                        }
                    }
                    if (isset($value)){
                        return $value;
                    }
                    else{
                        return 'Não existe endereço tipo 2';
                    }
                }
                else{
                    return 'Endereço não cadastrado.';
                }
            }
            

        ],

        ['header'=>'Ação',
        'headerOptions'=>['style'=> 'width: 120px'],
        'format'=>'raw',
        'value'=> function($model){
            return Html::a('<i class="fas fa-phone"></i>',['cliente/contato','id'=>$model->id_cliente],['class'=>'modalButton'])."&nbsp;&nbsp;&nbsp;"
            .Html::a('<i class="fas fa-edit"></i>',['cliente/atualizar','id'=>$model->id_cliente])."&nbsp;&nbsp;&nbsp;"
            .Html::a('<i class="fas fa-trash-alt"></i>',['cliente/deletar','id'=>$model->id_cliente]);
        }]

        
    ],


]) 
?>
 </div>

<!-- /.card-body -->
</div>
           <!-- /.card -->
           
         </div>
         
       </div>

