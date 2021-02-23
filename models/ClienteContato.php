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
            [['de_contato','ic_tipo_contato'],'required'],
            
        ];
    }
    public function getTipoContato(){
        return Lookup::items('contato');
    }
    public function attributeLabels()
    {
        return[
            'de_contato'=>'Contato',
            'ic_tipo_contato'=>'Tipo de Contato',
            'no_contato'=> 'PESSOA DE CONTATO'
        ];
    }
    
}