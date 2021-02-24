<?php $this->registerCss('body{background : #B0C4DE}');
use yii\widgets\DetailView;
?>
<div>
    <div>NOME:<?=$cliente->no_cliente?></div>
    <div>DATA DE CADASTRO<?=$cliente->dt_cadastro?></div>
    <div>SITUAÇÃO<?=$cliente->ic_situacao_cadastral?></div>
</div>
<?php
    if($cliente->clienteFisico){
         $this->render('_fisico',['cliente' => $cliente]);
        
    }
    if($cliente->clienteJuridico){
         $this->render('_juridico',['cliente' => $cliente]);
    
    }
    if($cliente->clienteContato){
         $this->render('_contato',['contato' => $cliente->clienteContato]);
    }
    if($cliente->clienteEndereco){
         $this->render('_endereco',['cliente'=> $cliente]);
    }
    
            DetailView::widget(['model'=>$cliente,
            'attributes'=>[
                ['attribute'=>'no_cliente','value'=>$cliente->no_cliente],
                ['attribute'=>'dt_cadastro','value'=>$cliente->dt_cadastro]
            ]
            ])
    
?>    