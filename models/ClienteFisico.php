<?php
namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\ActiveRecord;
class ClienteFisico extends ActiveRecord{
    public static function tableName()
    {
        return 'tb_cliente_fisico';
    }
    public function rules(){
        //[campos[],regras[]]
        return[
            [['co_cpf','dt_nascimento'],'required','message'=>'CAMPO OBRIGATóRIO'],
            [['co_cpf'],'string','length'=>[11,11]],// verifica se cpf tem 11 digitos
            //[['co_cpf'],'unique'],// verifica se cpf é unico
            [['co_rg'],'integer'] // verifica se rg é inteiro

        ];
    }
}