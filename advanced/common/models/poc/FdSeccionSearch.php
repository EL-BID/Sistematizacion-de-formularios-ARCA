<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdSeccion;

/**
 * FdSeccionSearch represents the model behind the search form about `common\models\poc\FdSeccion`.
 */
class FdSeccionSearch extends FdSeccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_seccion', 'orden', 'id_capitulo', 'num_columnas', 'num_col'], 'integer'],
            [['nom_seccion', 'stylecss'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = FdSeccion::find();

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
            'id_seccion' => $this->id_seccion,
            'orden' => $this->orden,
            'id_capitulo' => $this->id_capitulo,
            'num_columnas' => $this->num_columnas,
            'num_col' => $this->num_col,
        ]);

        $query->andFilterWhere(['like', 'nom_seccion', $this->nom_seccion])
            ->andFilterWhere(['like', 'stylecss', $this->stylecss]);

        return $dataProvider;
    }
    
     /*
     * var1-> id_capitulo
     */
    public function buscar($var1){
        
         $_findsecciones = Yii::$app->db->createCommand('SELECT fd_seccion.id_capitulo,
                            fd_seccion.id_seccion,
                            fd_seccion.nom_seccion,
                            fd_seccion.orden,
                            fd_seccion.num_columnas,
                            fd_seccion.num_col,
                            fd_seccion.stylecss,
                            fd_pregunta.nom_pregunta as comparar
                            FROM fd_seccion
                            LEFT JOIN fd_capitulo ON fd_capitulo.id_capitulo=fd_seccion.id_capitulo
                            LEFT JOIN fd_pregunta ON fd_pregunta.nom_pregunta=fd_seccion.nom_seccion 
                            and fd_seccion.id_seccion=fd_pregunta.id_seccion
                            WHERE fd_capitulo.id_capitulo =:idcapitulo ORDER BY fd_seccion.orden ASC')
                            ->bindValue(':idcapitulo', $var1)
                            ->queryAll();
         
         return $_findsecciones;
    }
    
}
