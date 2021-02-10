<?php
namespace app\controllers;

use app\models\Cliente;
use Symfony\Component\BrowserKit\Client;
use Yii;
use yii\web\Controller;
use app\models\ClienteFisico;
use app\models\ClienteJuridico;
use app\models\ClienteContato;
use app\models\ClienteEndereco;
use app\models\ClienteSeach;
use yii\web\NotFoundHttpException;

class ClienteController extends Controller{
    
    public function actionCadastrar($tipoCliente = null){
        $model = new Cliente();// render('views',['array'=> $variavelmodel])
        $fisico = new ClienteFisico();
        $juridico = new ClienteJuridico();
        $contato = new ClienteContato();
        $endereco = new ClienteEndereco();
         
        if ($model->load(Yii::$app->request->post())){// load(Carrega os dados para o post e salva)
            if($model->validate()){
                $model->id_usuario_fk=1; // quem tá cadastrando
                if(isset($_POST['ClienteFisico'])){
                    $fisico->load(yii::$app->request->post());
                    
                        $model->save(false); // salva os atributos da classe cliente
                        $fisico->id_cliente_fk = $model->id_cliente;
                        $fisico->save(false); // salva em cliente fisico
                        //return $this->redirect(['visualizar','id'=>$model->id_cliente]);
                    
                }
                if(isset($_POST['ClienteJuridico'])){
                    $juridico->load(yii::$app->request->post());
                    
                        $model->save(false);
                        $juridico->id_cliente_fk = $model->id_cliente;
                        $juridico->save(false);
                        //return $this->redirect(['visualizar',$model->id_cliente]);
                    
                }
                if(isset($_POST['ClienteEndereco'])){
                    $endereco->attributes($_POST['ClienteEndereco']);
                    $endereco->id_cliente_fk = $model->id_cliente;
                    $endereco->ic_situacao_endereco = 1;
                    $endereco->id_usuario_fk = 1;
                    $endereco->dt_usuario = date('Y-M-D');
                    //$endereco->save();
                    
                }
                if(isset($_POST['ClienteContato'])){
                    $contato->attributes($_POST['ClienteContato']);
                    $contato->id_cliente_fk = $model->id_cliente;
                    //$contato->save();
                }
                return $this->redirect(['visualizar','id'=>$model->id_cliente]);
                
            
            }
        }
        
        if($tipoCliente){
            return $this->render('form',
            ['cliente'=>$model,
            'juridico'=>$juridico,
            'contato'=>$contato,
            'endereco'=>$endereco,]);
        }
        else{
            return $this->render('form',
            ['cliente'=>$model,
            'fisico'=>$fisico,
            'contato'=>$contato,
            'endereco'=>$endereco]); 
        }
      
    }
    public function actionVisualizar($id){
        $model = $this->buscarModelo($id);
        return $this->render('visualizar',['cliente'=>$model]);
    }
    public function actionConsultar(){
        $seachModel = new ClienteSeach();
        $dataProvider = $seachModel->seach(Yii::$app->request->queryParams);
        return $this->render('principal',['seachModel'=>$seachModel,'dataProvider'=>$dataProvider]);
        
    }
    public function actionAtualizar($id){
        $model = $this->buscarModelo($id);
        $fisico = ClienteFisico::find()->where(['id_cliente_fk'=> $id])->one();
        $juridico = ClienteJuridico::find()->where(['id_cliente_fk'=>$id])->one();
        $contato = ClienteContato::find()->where(['id_cliente_fk'=>$id])->one();
        $endereco = ClienteEndereco::find()->where(['id_cliente_fk'=>$id])->one();
        if($fisico){
            return $this->render('form',
            ['cliente'=>$model, 
            'fisico'=>$fisico,
            'contato'=>$contato,
            'endereco'=>$endereco]);
        }
        else{
            return $this->render('form',
            ['cliente'=>$model, 
            'juridico'=>$juridico,
            'contato'=>$contato,
            'endereco'=>$endereco]);
        }
        
    }
    public function actionDeletar($id){

    }
    public function buscarModelo($id){
        $model= Cliente::findOne($id);
        if ($model!==null){
            return $model;
        }
        throw new NotFoundHttpException('Modelo não Encontrado.');//tratamento de erro
    }
    public function actionSearch(){
        $search = new ClienteSeach();
        return $this->renderAjax('_search',['model'=>$search]);
    }
    public function actionContato($id){
        $contact = ClienteContato::findAll($id);
        return $this->renderAjax('_contato',['contato'=>$contact]);
    }
}
?>