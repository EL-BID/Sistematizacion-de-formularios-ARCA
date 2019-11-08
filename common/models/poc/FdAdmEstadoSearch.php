<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdAdmEstado;

/**
 * FdAdmEstadoSearch represents the model behind the search form about `common\models\poc\FdAdmEstado`.
 */
class FdAdmEstadoSearch extends FdAdmEstado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_adm_estado', 'id_modulo'], 'integer'],
            [['nom_adm_estado', 'cod_rol', 'p_actualizar', 'p_crear', 'p_borrar', 'p_ejecutar'], 'safe'],
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
        $query = FdAdmEstado::find();

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
            'id_adm_estado' => $this->id_adm_estado,
            'id_modulo' => $this->id_modulo,
        ]);

        $query->andFilterWhere(['like', 'nom_adm_estado', $this->nom_adm_estado])
            ->andFilterWhere(['like', 'cod_rol', $this->cod_rol])
            ->andFilterWhere(['like', 'p_actualizar', $this->p_actualizar])
            ->andFilterWhere(['like', 'p_crear', $this->p_crear])
            ->andFilterWhere(['like', 'p_borrar', $this->p_borrar])
            ->andFilterWhere(['like', 'p_ejecutar', $this->p_ejecutar]);

        return $dataProvider;
    }
    
    
    /*Fncion para buscar los permisos de un usuario*/
    public function buscar($var1,$var2,$var3){
        
         
         $_findpermisos = Yii::$app->db->createCommand('SELECT fd_adm_estado.* FROM fd_adm_estado
                            LEFT JOIN fd_conjunto_respuesta ON fd_conjunto_respuesta.ult_id_adm_estado=fd_adm_estado.id_adm_estado
                            LEFT JOIN perfiles ON perfiles.cod_rol = fd_adm_estado.cod_rol
                            LEFT JOIN usuarios_ap ON usuarios_ap.id_usuario = perfiles.id_usuario
                            WHERE fd_conjunto_respuesta.id_formato= :formato
                            and fd_conjunto_respuesta.id_conjunto_respuesta= :id_conjunto_rpta
                            and usuarios_ap."usuario"= :usuario')
                            ->bindValue(':formato',$var1)
                            ->bindValue(':id_conjunto_rpta', $var2)
                            ->bindValue(':usuario', $var3)
                            ->queryOne();

         return $_findpermisos;
    }
}
