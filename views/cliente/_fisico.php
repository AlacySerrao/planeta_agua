<?php $this->registerCss('body{background : #B0C4DE}')?>
<table>
    <tr>
        <td>CLIENTE FÍSICO</td>
    </tr>
    <tr>
        <td>CPF</td>
        <td>DATA NASCIMENTO</td>
        <td>RG</td>
    </tr>
    <tr>
        <td><?=$cliente->clienteFisico->co_cpf?></td>
        <td><?=$cliente->clienteFisico->dt_nascimento?></td>
        <td><?=$cliente->clienteFisico->co_rg?></td>
    </tr>
</table>
