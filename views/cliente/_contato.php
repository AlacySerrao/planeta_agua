<?php $this->registerCss('body{background : #B0C4DE}')?>
<table>
    <tr>CONTATOS</tr>
    <tr><?php foreach ($contato as $value):?></tr>
    <tr><td><?=$value['de_contato'] ?></td></tr>
    <?php endforeach?>
</table>