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

    public function rules(){
        return [
            [['no_cliente','cpf','rg','cnpj','noFantasia','endereco','bairro','tell'],'safe'],
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
        $query->andFilterWhere(['like','no_cliente',$this->no_cliente]);
        $query->andFilterWhere(['like','tb_cliente_fisico.co_cpf',$this->cpf]);
        $query->andFilterWhere(['like','tb_cliente_juridico.co_cnpj',$this->cnpj]);
        $query->andFilterWhere(['like','tb_cliente_endereco.no_logradouro',$this->endereco]);
        return $dataProvider;
    }
}