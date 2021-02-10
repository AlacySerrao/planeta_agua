<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GrupoUsuario;

/**
 * GrupoUsuarioSearch represents the model behind the search form of `app\models\GrupoUsuario`.
 */
class GrupoUsuarioSearch extends GrupoUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_grupo_usuario'], 'integer'],
            [['no_grupo_usuario'], 'safe'],
            [['ic_permissao'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GrupoUsuario::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_grupo_usuario' => $this->id_grupo_usuario,
            'ic_permissao' => $this->ic_permissao,
        ]);

        $query->andFilterWhere(['ilike', 'no_grupo_usuario', $this->no_grupo_usuario]);

        return $dataProvider;
    }
}
