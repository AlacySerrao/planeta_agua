<?php
namespace app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;
use yii\debug\models\timeline\DataProvider;

class ClienteSeach extends Cliente{
    public $cpf;
    public $rg;
    public $cnpj;
    public $noFantasia;
    public $endereco;
    public $bairro;
    public $tell;
    public $busca;
    public $nome;
    public function rules(){
        return [
            [['no_cliente','cpf','rg','cnpj','noFantasia','endereco','bairro','tell','busca','nome'],'safe'],
            [['rg','cpf','cnpj'],'integer']
        ];
    }
    public function seach($par){
        $query = Cliente::find();
        $dataProvider = new ActiveDataProvider(['query'=>$query,'sort'=>['defaultOrder'=>['id_cliente'=>SORT_ASC]]]);
        $this->load($par);
        if (!$this->validate()){
            return $dataProvider;
        }
        /**
         * união das tabelas
         */
        $query->joinWith('clienteFisico');
        $query->joinWith('clienteJuridico');
        $query->joinWith('clienteEndereco');
        $query->joinWith('clienteContato');
        /**
         * condições de filtros
         */
        $query->andFilterWhere([
            'id_cliente'=>$this->id_cliente,

        ]);
            if (!empty($this->busca)){
                if(!is_numeric($this->busca)){
                    $this->nome = $this->busca;

                }
                else{
                    if(strlen($this->busca) == 11){
                        $this->cpf = $this->busca;
                    }
                    if (strlen($this->busca) == 14){
                        $this->cnpj = $this->busca;
                    }
                }
            }
        $query->andFilterWhere(['like','no_cliente',strtoupper($this->nome)]);
        $query->andFilterWhere(['like','tb_cliente_fisico.co_cpf',$this->cpf]);
        $query->andFilterWhere(['like','tb_cliente_juridico.co_cnpj',$this->cnpj]);
        $query->andFilterWhere(['like','tb_cliente_endereco.no_logradouro',$this->endereco]);
        
        return $dataProvider;
    }
}