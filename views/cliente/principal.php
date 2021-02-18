<?php

use app\models\ClienteContato;
use Codeception\PHPUnit\ResultPrinter\HTML as ResultPrinterHTML;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
$this->title='Clientes';
Modal::begin([
    'title' => 'Consultar Cliente',
    'size' => 'modal-xl',
    'id' => 'modal'
]);
echo"<div id='modalconteudo'></div>";
Modal::end();

?>


<p>
<?=//$this->render('_search',['model'=>$seachModel]);
    Html::a('Novo Cliente',['cliente/cadastrar'],['class'=>'modalButton btn btn-success btn-sm']);
?></p>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Exibir/Buscar Cliente</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

<?=GridView::widget([
    'dataProvider'=>$dataProvider,
        'tableOptions'=>['class'=>'table table-striped','cellspacing'=>'1','cellpadding'=>'3'],
        'layout'=>"{items}\n<div class='mx-auto'>{pager}</div>",
       'columns'=>[
        
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