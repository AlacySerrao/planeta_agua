<?php
use yii\bootstrap4\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
Modal::begin([
    'title' => 'Consultar Endereços',
    'size' => 'modal-xl',
    'id' => 'modal'
]);
echo"<div id='modalconteudo'></div>";
Modal::end();

?>
<div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                        <span class="product-description">CLIENTE</span>
                
                        </div>
                    </div><!-- /.info-box-content -->
                </div>   
            </div>
        </div><!--./card-header-->
    </div><!--./card card-default-->
    
    <?=
        Tabs::widget([
            'items'=>[
                [
                    'label'=>'Detalhes do Cliente',
                    'url'=>Url::toRoute(['cliente/visualizar','id'=>$cliente->id_cliente]),
                    
                ],
                [
                    'label'=>'Informações do Cliente',
                    'url'=>Url::toRoute(['cliente/atualizar','id'=>$cliente->id_cliente])
                ],
                [
                    'label'=>'Endereço e Contatos',
                    'content'=>$this->render('_endereco',['cliente'=>$cliente]),
                    'active'=>true
                ]

            ]





        ])    
    ?>
</div>