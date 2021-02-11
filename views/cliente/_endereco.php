<?php $this->registerCss('body{background : #B0C4DE}')?>
<table>
    <tr>ENDEREÇOS</tr>
    <tr><?php foreach ($cliente->clienteEndereco as $value):?></tr>
    <tr><td><?=$value['no_bairro'].' - '.$value['no_logradouro'] ?></td></tr>
    <?php endforeach?>
</table>