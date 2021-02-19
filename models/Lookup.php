<?php
namespace app\models;
use Yii;
use \yii\db\ActiveRecord;
class Lookup extends ActiveRecord{
    /**
     * id_lookup
     * de_nome
     * de_tipo
     * nu_codigo
     * nu_posicao
     * 
     */
    private static $itens = array();
    public static function tableName()
    {
        return 'tb_lookup';
    }
    public function rules()
    {
        return [
            [['id_lookup','de_nome','de_tipo','nu_codigo','nu_posicao'],'safe']
        ];
    }
    
    public static function items($tipo){
        if(!isset(self::$itens[$tipo])){
            self::buscarItens($tipo);
            return self::$itens[$tipo];
        }

    }
    /**
     * Traz itens
     */
    private static function buscarItens($tipo){
        self::$itens[$tipo] = array();
        $models = parent::find()->where(['de_tipo'=>$tipo])->orderBy(['nu_posicao'=>SORT_ASC])->all();
        foreach ($models as $i){
            self::$itens[$tipo][$i['nu_codigo']] = $i['de_nome']; 
            /**
             * $itens['zona']['1'] = 'zona norte'
             * $itens['zona']['2'] = 'zona sul'
             */
        }
    }
    public static function trazerItem($tipo,$cod){
        if(!isset(self::$itens[$tipo]))
			self::buscarItens($tipo);
		return isset(self::$itens[$tipo][$cod]) ? self::$itens[$tipo][$cod] : false;
    } 
    
    

}