<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_usuario_sistema".
 *
 * @property int $id_usuario_sistema
 * @property int $id_grupo_usuario_fk
 * @property string $no_usuario
 * @property string $no_acesso
 * @property string $co_senha
 * @property bool|null $ic_permitir_acesso
 * @property string|null $dt_login
 * @property bool|null $ic_exluido
 *
 * @property TbCategoria[] $tbCategorias
 * @property TbCliente[] $tbClientes
 * @property TbClienteAgenda[] $tbClienteAgendas
 * @property TbCompra[] $tbCompras
 * @property TbCotacao[] $tbCotacaos
 * @property TbDespesa[] $tbDespesas
 * @property TbEmpresa[] $tbEmpresas
 * @property TbEquipamento[] $tbEquipamentos
 * @property TbFuncionario[] $tbFuncionarios
 * @property TbOrdemServico[] $tbOrdemServicos
 * @property TbProduto[] $tbProdutos
 * @property TbReceita[] $tbReceitas
 * @property TbRota[] $tbRotas
 * @property TbServico[] $tbServicos
 * @property TbGrupoUsuario $grupoUsuarioFk
 * @property TbVenda[] $tbVendas
 */
class UsuarioSistema extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_usuario_sistema';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_grupo_usuario_fk', 'no_usuario', 'no_acesso', 'co_senha'], 'required'],
            [['id_grupo_usuario_fk'], 'default', 'value' => null],
            [['id_grupo_usuario_fk'], 'integer'],
            [['ic_permitir_acesso', 'ic_exluido'], 'boolean'],
            [['dt_login'], 'safe'],
            [['no_usuario'], 'string', 'max' => 70],
            [['no_acesso'], 'string', 'max' => 15],
            [['co_senha'], 'string', 'max' => 32],
            [['id_grupo_usuario_fk'], 'exist', 'skipOnError' => true, 'targetClass' => GrupoUsuario::className(), 'targetAttribute' => ['id_grupo_usuario_fk' => 'id_grupo_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario_sistema' => 'Id Usuario Sistema',
            'id_grupo_usuario_fk' => 'Id Grupo Usuario Fk',
            'no_usuario' => 'No Usuario',
            'no_acesso' => 'No Acesso',
            'co_senha' => 'Co Senha',
            'ic_permitir_acesso' => 'Ic Permitir Acesso',
            'dt_login' => 'Dt Login',
            'ic_exluido' => 'Ic Exluido',
        ];
    }

    /**
     * Gets query for [[TbCategorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbCategorias()
    {
        //return $this->hasMany(TbCategoria::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbClientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbClientes()
    {
        //return $this->hasMany(TbCliente::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbClienteAgendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbClienteAgendas()
    {
        //return $this->hasMany(TbClienteAgenda::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbCompras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbCompras()
    {
        //return $this->hasMany(TbCompra::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbCotacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbCotacaos()
    {
        //return $this->hasMany(TbCotacao::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbDespesas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbDespesas()
    {
        //return $this->hasMany(TbDespesa::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbEmpresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbEmpresas()
    {
        //return $this->hasMany(TbEmpresa::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbEquipamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbEquipamentos()
    {
        //return $this->hasMany(TbEquipamento::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbFuncionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbFuncionarios()
    {
        //return $this->hasMany(TbFuncionario::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbOrdemServicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbOrdemServicos()
    {
        //return $this->hasMany(TbOrdemServico::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbProdutos()
    {
        //return $this->hasMany(TbProduto::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbReceitas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbReceitas()
    {
        //return $this->hasMany(TbReceita::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbRotas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbRotas()
    {
        //return $this->hasMany(TbRota::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[TbServicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbServicos()
    {
        //return $this->hasMany(TbServico::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }

    /**
     * Gets query for [[GrupoUsuarioFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoUsuarioFk()
    {
        //return $this->hasOne(TbGrupoUsuario::className(), ['id_grupo_usuario' => 'id_grupo_usuario_fk']);
    }

    /**
     * Gets query for [[TbVendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTbVendas()
    {
        //return $this->hasMany(TbVenda::className(), ['id_usuario_fk' => 'id_usuario_sistema']);
    }
}
