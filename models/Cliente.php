<?php
namespace app\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\ActiveRecord;
class Cliente extends ActiveRecord{
    public static function tableName()
    {
        return 'tb_cliente';
    }
    public function rules(){
        //[campos[],regras[]]
        return[
            [['no_cliente','dt_cadastro'],'required'],// Obriga que os campos nome e data sejam preenchidos
            [['no_cliente'],'string','length'=>[3,70]] // limita que o campo no receba no minimo 3 caracteres.

        ];
    }
    public function attributeLabels()
    {
        return[
            'no_cliente'=> 'Nome do cliente',
            'ic_situacao_cadastral' => 'Status',
            'dt_cadastro' => 'Data de cadastro',
            

        ];
    }
    /**
     * Relacionamento da classe Cliente com a classe clienteFisico
     */
    public function getClienteFisico(){
        return $this->hasOne(ClienteFisico::class, ['id_cliente_fk' => 'id_cliente']);
    }
    public function getClienteJuridico(){
        return $this->hasOne(ClienteJuridico::class, ['id_cliente_fk' => 'id_cliente']);
    }
    public function getClienteContato(){
        return $this->hasMany(ClienteContato::class, ['id_cliente_fk' => 'id_cliente']);
    }
    public function getClienteEndereco(){
        return $this->hasMany(ClienteEndereco::class, ['id_cliente_fk' => 'id_cliente']);
    }
    public function getZona($cod){
        return Lookup::trazerItem('zona',$cod)?Lookup::trazerItem('zona',$cod):'Não Informado'; // if ternario
    }
}