<?php
use yii\grid\GridView;
?>


<div class="col-md-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">   Título     </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <?=GridView::widget([
                  'tableOptions' => ['class' => 'table table-striped  projects', 'width'=>'100% ',  'cellspacing'=>'1','cellpadding'=>'3', 'border'=>'0'],
    
    'dataProvider'=>$dataProvider,
    'filterModel'=>$seachModel,
    'columns'=>[
        'id_cliente',
        'no_cliente',
        'clienteFisico.co_cpf',
        'clienteJuridico.co_cnpj',
        'clienteEndereco.no_logradouro'
    ],
    

])?>

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                            
            </div>
            </div>
            <!-- /.card -->

    </div>


