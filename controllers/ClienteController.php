<?php
namespace app\controllers;
use yii\data\ActiveDataProvider;
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
    
    public function actionCreate(){
        $cliente = new Cliente();// render('views',['array'=> $variavelmodel])
        $fisico = new ClienteFisico();
        $juridico = new ClienteJuridico();
        $contato = new ClienteContato();
        $endereco = new ClienteEndereco();
         
        //if ($cliente->load(Yii::$app->request->post())){// load(Carrega os dados para o post e salva)
            $tipo = empty($_POST['ClienteFisico']['co_cpf'])?true:false;
            if ($tipo){
                if($fisico->validate() && $cliente->validate() && $endereco->validate() && $contato->validade()){
                    echo'é cliente físico';
                }
            }
            else{
                if($juridico->validate() && $cliente->validate() && $endereco->validate() && $contato->validade()){
                    echo'é cliente juridico';
                }
            }
            
                    
            
        //}
        
        
            return $this->render('cadastrar',
            ['cliente'=>$cliente,
            'fisico'=>$fisico,
            'juridico'=>$juridico,
            'contato'=>$contato,
            'endereco'=>$endereco,]);
        
        
      
    }
    public function actionCfj(){
        
    }
    public function actionVisualizar($id){
        $model = $this->buscarModelo($id);
        return $this->render('tab',['cliente'=>$model]);
    }
    public function actionConsultar(){
        $seachModel = new ClienteSeach();
        $dataProvider = $seachModel->seach(Yii::$app->request->queryParams);
        $pages = $dataProvider->pagination;
        
        return $this->render('principal',['seachModel'=>$seachModel,'dataProvider'=>$dataProvider
        ,'pages'=>$pages]);
        
    }
    public function actionAtualizar($id){
        $model = $this->buscarModelo($id);
        $fisico = ClienteFisico::find()->where(['id_cliente_fk'=> $id])->one();
        $juridico = ClienteJuridico::find()->where(['id_cliente_fk'=>$id])->one();
        $contato = ClienteContato::find()->where(['id_cliente_fk'=>$id])->one();
        $endereco = ClienteEndereco::find()->where(['id_cliente_fk'=>$id])->one();
        if ($model->load(Yii::$app->request->post())){// load(Carrega os dados para o post e salva)
            if($model->validate()){
                $this->salvar($model,$fisico,$juridico, $endereco, $contato);
            
            }
        }   
            if (empty($fisico)){
            $fisico = new ClienteFisico();
            }

            if (empty($juridico)){
                $juridico = new ClienteJuridico;
            }
            if(empty($contato)){
                $contato = new ClienteContato;
            }
            return $this->render('atualizar',
            ['cliente'=>$model, 
            'fisico'=>$fisico,
            'juridico'=>$juridico,
            'contato'=>$contato,
            'endereco'=>$endereco]);
        
                
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
    public function actionEndContato($id){
        $cliente = $this->buscarModelo($id);
        $endereco = new  ActiveDataProvider(['query'=>ClienteEndereco::find()->
        where(['id_cliente_fk'=>$id])->andWhere(['ic_excluido'=>false])]);

        $contato = new ActiveDataProvider(['query'=>ClienteContato::find()->
        where(['id_cliente_fk'=>$id])->andWhere(['ic_excluido'=>false])]);
        return $this->render('end_contato',['cliente'=>$cliente,'endereco'=>$endereco,'contato'=>$contato]);
    }
    private  function salvar($model,$fisico,$juridico,$endereco,$contato){
        $model->id_usuario_fk=1; // quem tá cadastrando
        $model->dt_cadastro = date('Y-m-d',strtotime($model->dt_cadastro));
                if(isset($_POST['ClienteFisico'])){
                    $fisico->load(yii::$app->request->post());
                    
                        $model->save(); // salva os atributos da classe cliente
                        $fisico->id_cliente_fk = $model->id_cliente;
                        $fisico->save(); // salva em cliente fisico
                        //return $this->redirect(['visualizar','id'=>$model->id_cliente]);
                    
                }
                if(isset($_POST['ClienteJuridico'])){
                    $juridico->load(yii::$app->request->post());
                    
                        $model->save();
                        $juridico->id_cliente_fk = $model->id_cliente;
                        $juridico->save();
                        //return $this->redirect(['visualizar',$model->id_cliente]);
                    
                }
                if(isset($_POST['ClienteEndereco'])){
                    $endereco->load(yii::$app->request->post());
                    $endereco->id_cliente_fk = $model->id_cliente;
                    $endereco->ic_situacao_endereco = 1;
                    $endereco->id_usuario_fk = 1;
                    $endereco->dt_usuario = date('Y-m-d');
                    $endereco->save();
                    
                }
                if(isset($_POST['ClienteContato'])){
                    $contato->load(yii::$app->request->post());
                    $contato->id_cliente_fk = $model->id_cliente;
                    $contato->save();
                }
                return $this->redirect(['visualizar','id'=>$model->id_cliente]);
    } 
}
?>