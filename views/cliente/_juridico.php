<?php $this->registerCss('body{background : #B0C4DE}')?>
<table>
    <tr>
        <td>CLIENTE JURIDÍCO</td>
    </tr>
    <tr>
        <td>CNPJ</td>
        <td>NOME FANTASIA</td>
        <td>DATA DE ABERTURA</td>
    </tr>
    <tr>
        <td><?=$cliente->clienteJuridico->co_cnpj?></td>
        <td><?=$cliente->clienteJuridico->no_fantasia?></td>
        <td><?=$cliente->clienteJuridico->dt_abertura?></td>
    </tr>
</table>