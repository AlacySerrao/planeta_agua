<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClienteContato;

/**
 * ClienteContatoSearch represents the model behind the search form of `app\models\ClienteContato`.
 */
class ClienteContatoSearch extends ClienteContato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente_contato', 'id_cliente_fk', 'ic_tipo_contato'], 'integer'],
            [['de_contato', 'no_contato'], 'safe'],
            [['ic_excuido'], 'boolean'],
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
        $query = ClienteContato::find();

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
            'id_cliente_contato' => $this->id_cliente_contato,
            'id_cliente_fk' => $this->id_cliente_fk,
            'ic_tipo_contato' => $this->ic_tipo_contato,
            'ic_excuido' => $this->ic_excuido,
        ]);

        $query->andFilterWhere(['ilike', 'de_contato', $this->de_contato])
            ->andFilterWhere(['ilike', 'no_contato', $this->no_contato]);

        return $dataProvider;
    }
}
