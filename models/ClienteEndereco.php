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
            [['no_logradouro','co_logradouro','no_bairro','co_cep','no_cidade','ic_zona','sg_uf'],'required'],
            [['co_cep'],'string','length'=>[8,8]],
            [['ic_tipo_endereco','ic_situacao_endereco'],'default','value'=>1],
            
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