<div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                        <span class="product-description">NOVO CLIENTE</span>
                
                        </div>
                    </div><!-- /.info-box-content -->
                </div>   
            </div>
        </div><!--./card-header-->
    </div><!--./card card-default-->
<?=
    $this->render('form',
    ['cliente'=>$cliente, 
    'fisico'=>$fisico,
    'juridico'=>$juridico,
    'contato'=>$contato,
    'endereco'=>$endereco,
    'tipo'=>'cadastrar'])
?>