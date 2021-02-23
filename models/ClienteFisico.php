<?php
namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\ActiveRecord;
class ClienteFisico extends ActiveRecord{
    private $cpf;
    public static function tableName()
    {
        return 'tb_cliente_fisico';
    }
    public function rules(){
        //[campos[],regras[]]
        return[
            [['co_cpf','dt_nascimento'],'required'],
            [['co_cpf'],'string','length'=>[11,11]],// verifica se cpf tem 11 digitos
            //[['co_cpf'],'unique'],// verifica se cpf é unico
            [['co_rg'],'integer'], // verifica se rg é inteiro
            //['co_cpf','validarCPF']

        ];
    }
    public function attributeLabels()
    {
        return[
            'co_cpf'=> 'CPF',
            'dt_nascimento'=> 'Data de Nascimento',
            'co_rg'=> 'RG',
        ];
    }
    public function validarCPF($attribute){
        
        if(!empty($attribute)){
            if(strlen($attribute)< 11 ){
                $this->addError('cpf','CPF Inválido');

            }
            else{
                if(!preg_match('/[0-9]/',$attribute)){
                    $this->addError('cpf','CPF deve conter apenas números');}
            }
        }
        else{
            $this->addError('cpf','Campo obrigatório');
        }
    }
}