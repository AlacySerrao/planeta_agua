<?php
namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\ActiveRecord;
class ClienteJuridico extends ActiveRecord{
    public static function tableName()
    {
        return 'tb_cliente_juridico';
    }
    public function rules(){
        //[campos[],regras[]]
        return[
            [['co_cnpj','dt_abertura'],'required','message'=>'CAMPO OBRIGATóRIO'],
            [['co_cnpj'],'string','length'=>[14,14]],// verifica se cnpj tem 14 digitos
            [['co_cnpj'],'unique'],// verifica se cnpj é unico
            [['no_fantasia'],'safe']
            

        ];
    }
}