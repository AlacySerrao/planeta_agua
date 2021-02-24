<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteContato */


?>
<div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-info"><i class="fas fa-phone-square-alt"></i></span>

                        <div class="info-box-content">
                        <span class="product-description">NOVO CONTATO</span>
                
                        </div>
                    </div><!-- /.info-box-content -->
                </div>   
            </div>
        </div><!--./card-header-->
    </div><!--./card card-default-->

<div class="cliente-contato-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
