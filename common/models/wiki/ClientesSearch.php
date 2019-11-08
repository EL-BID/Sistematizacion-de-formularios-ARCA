<?php

namespace common\models\wiki;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\wiki\Clientes;

/**
 * ClientesSearch representa el modelo de busqueda para el modelo `frontend\models\Clientes`.
 */
class ClientesSearch extends Clientes
{

   
    public function rules()
    {
        return [
            [['name', 'lastname'], 'string'],
            [['birthdate', 'createdate'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }


    public function search($params)
    {
        $query = Clientes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id' => $this->Id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthdate' => $this->birthdate,
			'createdate' => $this->createdate,
        ]);


        return $dataProvider;
    }
}