<?php $this->registerCss('body{background : #B0C4DE}')?>
<div>
    <div>NOME:<?=$cliente->no_cliente?></div>
    <div>DATA DE CADASTRO<?=$cliente->dt_cadastro?></div>
    <div>SITUAÇÃO<?=$cliente->ic_situacao_cadastral?></div>
</div>
<?php
    if($cliente->clienteFisico){
        echo $this->render('_fisico',['cliente' => $cliente]);
        
    }
    if($cliente->clienteJuridico){
        echo $this->render('_juridico',['cliente' => $cliente]);
    
    }
    if($cliente->clienteContato){
        echo $this->render('_contato',['contato' => $cliente->clienteContato]);
    }
    if($cliente->clienteEndereco){
        echo $this->render('_endereco',['cliente'=> $cliente]);
    }
?>    