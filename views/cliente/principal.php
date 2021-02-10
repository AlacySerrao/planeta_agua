<?php

use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
$this->title='Cadastro de Clientes';
Modal::begin([
    'title' => 'Consultar Cliente',
    'size' => 'modal-xl',
    'id' => 'modal'
]);
echo"<div id='modalconteudo'></div>";
Modal::end();
?>
<div class="card">
<div class = "card-header">

<div class = "card-title">Exibir/ Buscar Cliente</div>
<div class = "card-tools">
<?=//$this->render('_search',['model'=>$seachModel]);
    Html::a('Buscar Cliente',['cliente/search'],['class'=>'modalButton btn btn-info btn-sm']);
?>
</div>
</div>
</div>
<div class="col-md-16">
<div class="card">

<div class="card-body table-responsive">
<?=GridView::widget([
    'dataProvider'=>$dataProvider,
        'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellpadding'=>'3'],
       'columns'=>[
        ['class' => 'yii\grid\SerialColumn'],
        ['header'=> 'código',
        'headerOptions'=>['style'=>'text-aling: center; widht: 100px'],
        'format'=>'raw',
        'value' => function($model){
            $codigo = str_pad($model->id_cliente,5,0,STR_PAD_LEFT); 
            return HTML::a($codigo,['cliente/visualizar','id'=>$model->id_cliente]);
        },
        ],
        ['header'=>'nome',
            'headerOptions'=>['style'=>'widht:300px'],
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
        'headerOptions'=>['style'=> 'width: 100px'],
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
</div>
</div>
<?php
$js = <<< JS
    /*$('#modalbutton').click(    
        function(){
            $.get(
                $(this).attr('href'), function(data){
                    $('#modal').modal('show').find('#modalconteudo').html(data);
                }
            );
        }
    
    );  */
    $(function(){
  
  $('.modalButton').click(function (){
      $.get($(this).attr('href'), function(data) {
        $('#modal').modal('show').find('#modalconteudo').html(data)
     });
     return false;
  });
});    
      
JS;
$this->registerJs($js);
?>