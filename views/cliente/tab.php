<?php
use yii\bootstrap4\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="cliente-tab">
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
                    'content'=>$this->render('visualizar',['cliente'=>$cliente]),
                    'active'=>true,
                ],
                [
                    'label'=>'Informações do Cliente',
                    'url'=>Url::toRoute(['cliente/atualizar','id'=>$cliente->id_cliente])
                ],
                [
                    'label'=>'Endereço e Contatos',
                    'url'=>Url::toRoute(['cliente/end-contato','id'=>$cliente->id_cliente]),
                ]

            ]





        ])    
    ?>
</div>