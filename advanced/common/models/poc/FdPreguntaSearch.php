<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdPregunta;

/**
 * FdPreguntaSearch represents the model behind the search form about `common\models\poc\FdPregunta`.
 */
class FdPreguntaSearch extends FdPregunta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pregunta', 'max_largo', 'min_largo', 'orden', 'id_tpregunta', 'id_capitulo', 'id_seccion', 'id_agrupacion', 'id_tselect', 'id_conjunto_pregunta', 'num_col_label', 'num_col_input'], 'integer'],
            [['nom_pregunta', 'ayuda_pregunta', 'obligatorio', 'max_date', 'min_date', 'estado', 'ini_fecha', 'fin_fecha', 'caracteristica_preg', 'visible', 'visible_desc_preg', 'stylecss', 'format', 'atributos', 'reg_exp', 'numerada'], 'safe'],
            [['min_number', 'max_number'], 'number'],
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
        $query = FdPregunta::find();

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
            'id_pregunta' => $this->id_pregunta,
            'max_largo' => $this->max_largo,
            'min_largo' => $this->min_largo,
            'max_date' => $this->max_date,
            'min_date' => $this->min_date,
            'orden' => $this->orden,
            'ini_fecha' => $this->ini_fecha,
            'fin_fecha' => $this->fin_fecha,
            'id_tpregunta' => $this->id_tpregunta,
            'id_capitulo' => $this->id_capitulo,
            'id_seccion' => $this->id_seccion,
            'id_agrupacion' => $this->id_agrupacion,
            'id_tselect' => $this->id_tselect,
            'id_conjunto_pregunta' => $this->id_conjunto_pregunta,
            'num_col_label' => $this->num_col_label,
            'num_col_input' => $this->num_col_input,
            'min_number' => $this->min_number,
            'max_number' => $this->max_number,
        ]);

        $query->andFilterWhere(['like', 'nom_pregunta', $this->nom_pregunta])
            ->andFilterWhere(['like', 'ayuda_pregunta', $this->ayuda_pregunta])
            ->andFilterWhere(['like', 'obligatorio', $this->obligatorio])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'caracteristica_preg', $this->caracteristica_preg])
            ->andFilterWhere(['like', 'visible', $this->visible])
            ->andFilterWhere(['like', 'visible_desc_preg', $this->visible_desc_preg])
            ->andFilterWhere(['like', 'stylecss', $this->stylecss])
            ->andFilterWhere(['like', 'format', $this->format])
            ->andFilterWhere(['like', 'atributos', $this->atributos])
            ->andFilterWhere(['like', 'reg_exp', $this->reg_exp])
            ->andFilterWhere(['like', 'numerada', $this->numerada]);

        return $dataProvider;
    }
    
     /*
     * var1-> id_capitulo
     * var2->id_conjunto_pregunta
     * var3->id_conjunto_respuesta
     */
    public function buscar($var1,$var2,$var3){
        
         
         $_findpreguntas = Yii::$app->db->createCommand('SELECT fd_pregunta.id_pregunta,
                            fd_respuesta.id_respuesta,
                            fd_pregunta.id_conjunto_pregunta,
                            fd_pregunta.id_capitulo,
                            fd_pregunta.id_seccion,
                            fd_pregunta.orden,
                            fd_pregunta.nom_pregunta,
                            fd_pregunta.ayuda_pregunta,
                            fd_pregunta.id_agrupacion,
                            fd_pregunta.ini_fecha,
                            fd_pregunta.fin_fecha,
                            fd_pregunta.visible,
                            fd_pregunta.visible_desc_preg,
                            fd_agrupacion.nom_agrupacion as ag_descripcion,
                            fd_agrupacion.num_col as ag_num_col,
                            fd_agrupacion.num_row as ag_num_row,
                            fd_agrupacion.id_tagrupacion as tipo_agrupacion,
                            fd_pregunta.caracteristica_preg,
                            fd_pregunta.num_col_label,
                            fd_pregunta.num_col_input,
                            fd_pregunta.stylecss,
                            fd_pregunta.format,
                            fd_pregunta.id_tpregunta,
                            fd_tipo_pregunta.url_subpantalla as tp_url_subpantalla,
                            fd_pregunta.obligatorio,
                            fd_pregunta.reg_exp,
                            fd_pregunta.ayuda_pregunta,
                            fd_pregunta.atributos,
                            fd_pregunta.max_date,
                            fd_pregunta.min_date,
                            fd_respuesta.ra_fecha,
                            fd_respuesta.ra_check,
                            fd_pregunta.id_tselect,
                            fd_respuesta.id_opcion_select,
                            fd_pregunta.max_largo,
                            fd_pregunta.min_largo,
                            fd_respuesta.ra_descripcion,
                            fd_pregunta.max_number,
                            fd_pregunta.min_number,
                            fd_respuesta.ra_entero,
                            fd_respuesta.ra_decimal,
                            fd_respuesta.ra_moneda,
                            fd_respuesta.ra_porcentaje,
                            fd_respuesta.cantidad_registros,
                            fd_elemento_condicion.id_pregunta_habilitadora,
                            fd_elemento_condicion.operacion,
                            fd_elemento_condicion.valor,
                            fd_elemento_condicion.id_tcondicion,
                            fd_cond_1.id_pregunta_condicionada,
                            fd_cond_1.operacion as opercond,
                            fd_cond_1.valor as valorcond,
                            fd_cond_1.id_tcondicion as tcond
                            FROM fd_pregunta
                            LEFT JOIN fd_respuesta ON fd_respuesta.id_pregunta=fd_pregunta.id_pregunta and fd_respuesta.id_conjunto_respuesta=:id_conjunto_rpta
                            LEFT JOIN fd_agrupacion ON fd_agrupacion.id_agrupacion=fd_pregunta.id_agrupacion
                            LEFT JOIN fd_tipo_pregunta ON fd_tipo_pregunta.id_tpregunta=fd_pregunta.id_tpregunta
                            LEFT JOIN fd_elemento_condicion ON fd_elemento_condicion.id_pregunta_condicionada=fd_pregunta.id_pregunta and fd_elemento_condicion.id_tcondicion = 2
                            LEFT JOIN fd_elemento_condicion as fd_cond_1 ON fd_cond_1.id_pregunta_habilitadora=fd_pregunta.id_pregunta and fd_cond_1.id_tcondicion = 1
                            WHERE fd_pregunta.id_capitulo=:idcapitulo
                            and fd_pregunta.id_conjunto_pregunta=:id_conjunto_prta
                            and fd_pregunta.estado=:estado                             
                            ORDER BY fd_pregunta.id_seccion,fd_pregunta.orden')
                            ->bindValue(':idcapitulo',$var1)
                            ->bindValue(':id_conjunto_prta', $var2)
                            ->bindValue(':id_conjunto_rpta', $var3)
                            ->bindValue(':estado', 'S')   
                            ->queryAll();

         return $_findpreguntas;
    }
}
