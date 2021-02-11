<?php
namespace app\models;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\ActiveRecord;

class ClienteContato extends ActiveRecord{
    public static function tableName()
    {
        return 'tb_cliente_contato';
    }
    public function rules(){
        return[
            [['de_contato'],'required','message'=>'CAMPO OBRIGATÓRIO'],
        ];
    }
    public function getTipoContato(){
        return Lookup::$itens('contato');
    }
    
}