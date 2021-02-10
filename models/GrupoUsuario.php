<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_grupo_usuario".
 *
 * @property int $id_grupo_usuario
 * @property string|null $no_grupo_usuario
 * @property bool|null $ic_permissao
 *
 * @property TbUsuarioSistema[] $tbUsuarioSistemas
 */
class GrupoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_grupo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ic_permissao'], 'boolean'],
            [['no_grupo_usuario'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_grupo_usuario' => 'Id Grupo Usuario',
            'no_grupo_usuario' => 'No Grupo Usuario',
            'ic_permissao' => 'Ic Permissao',
        ];
    }

    /**
     * Gets query for [[TbUsuarioSistemas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbUsuarioSistemas()
    {
        return $this->hasMany(UsuarioSistema::className(), ['id_grupo_usuario_fk' => 'id_grupo_usuario']);
    }
}
