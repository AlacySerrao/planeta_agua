<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClienteEndereco;

/**
 * ClienteEnderecoSearch represents the model behind the search form of `app\models\ClienteEndereco`.
 */
class ClienteEnderecoSearch extends ClienteEndereco
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_endereco', 'id_cliente_fk', 'ic_tipo_endereco', 'ic_situacao_endereco', 'nu_cliente_latitude', 'nu_cliente_longitude', 'id_usuario_fk', 'ic_zona'], 'integer'],
            [['no_logradouro', 'co_logradouro', 'no_bairro', 'no_complemento', 'co_cep', 'no_cidade', 'sg_uf', 'dt_usuario'], 'safe'],
            [['ic_excluido'], 'boolean'],
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
        $query = ClienteEndereco::find();

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
            'id_cliente_endereco' => $this->id_cliente_endereco,
            'id_cliente_fk' => $this->id_cliente_fk,
            'ic_tipo_endereco' => $this->ic_tipo_endereco,
            'ic_situacao_endereco' => $this->ic_situacao_endereco,
            'nu_cliente_latitude' => $this->nu_cliente_latitude,
            'nu_cliente_longitude' => $this->nu_cliente_longitude,
            'id_usuario_fk' => $this->id_usuario_fk,
            'dt_usuario' => $this->dt_usuario,
            'ic_zona' => $this->ic_zona,
            'ic_excluido' => $this->ic_excluido,
        ]);

        $query->andFilterWhere(['ilike', 'no_logradouro', $this->no_logradouro])
            ->andFilterWhere(['ilike', 'co_logradouro', $this->co_logradouro])
            ->andFilterWhere(['ilike', 'no_bairro', $this->no_bairro])
            ->andFilterWhere(['ilike', 'no_complemento', $this->no_complemento])
            ->andFilterWhere(['ilike', 'co_cep', $this->co_cep])
            ->andFilterWhere(['ilike', 'no_cidade', $this->no_cidade])
            ->andFilterWhere(['ilike', 'sg_uf', $this->sg_uf]);

        return $dataProvider;
    }
}
