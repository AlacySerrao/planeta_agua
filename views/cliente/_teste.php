<?php $this->registerCss('body{background : #B0C4DE}')?>
<div class="kv-detail-content">
    <h5>Detalhes do Cliente</h5>
    <div class="row"> 
        <div class = "col-sm-8">     
            <table class="table table-bordered table-condensed table-hover small kv-table">
            <tbody>
                <tr class="danger"><th class="text-center text-info" colspan="4">Endereço do Cliente</th></tr>
                <tr><th>Logradouro</th><th>Número</th><th>Bairro</th><th>Cidade/UF</th></tr>
                <?php foreach($cliente->clienteEndereco as $value):?>
                <tr>
                    <td><?=$value['no_logradouro']?></td>
                    <td><?=$value['co_logradouro']?></td>
                    <td><?=$value['no_bairro']?></td>
                    <td><?=$value['no_cidade'].' - '.$value['sg_uf']?></td>
                </tr>
                <?php endforeach?>
            </tbody>
            
            </table>
        </div>
        <div class = "col-sm-2">
            <table class = "table table-bordered table-condensed table-hover small kv-table">
            <tbody>    
                <tr class="danger"><th class="text-center text-info" colspan="4">Contatos</th></tr>
                <tr><th>Tipo</th><th>Contato</th></tr>
                <tr><?php foreach ($cliente->clienteContato as $value):?></tr>

                    <tr>
                    <td><?=$value['ic_tipo_contato'] ?></td>
                    <td><?=$value['de_contato'] ?></td>
                    
                    </tr>
                <?php endforeach?>
            </tbody>
            </table>
        </div>
    </div>
</div>    