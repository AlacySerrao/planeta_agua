<?php
namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class ClienteEndereco extends ActiveRecord{
    
    public static function tableName(){
        return 'tb_cliente_endereco';
    }
    public function rules(){
        return[
            [['id_cliente_fk', 'no_logradouro', 'co_logradouro', 'no_bairro', 'co_cep','no_cidade','sg_uf','ic_zona'], 'required'],
            [['ic_tipo_endereco', 'ic_situacao_endereco'], 'default', 'value' => 1],
            [['id_cliente_fk', 'ic_tipo_endereco', 'id_usuario_fk', 'ic_zona', 'ic_situacao_endereco'], 'integer'],
            [['nu_cliente_latitude', 'nu_cliente_longitude'], 'number'],
            [['dt_usuario','ic_tipo_endereco'], 'safe'],
            [['ic_excluido'], 'boolean'],
            
        ];
        

    }
    public function getListaEstados(){
        $estado = Uf::find()->orderBy(['de_uf'=>SORT_ASC])->all();
        return ArrayHelper::map($estado,'sg_uf','de_uf');
    }
    public function getListaZonas(){
        return Lookup::items('zona');
    }
    public function getTipoEndereco(){
        return Lookup::items('endereco');
    }
}