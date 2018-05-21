<?php

namespace common\models\poc;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\poc\FdCapitulo;

/**
 * FdCapituloSearch represents the model behind the search form about `common\models\poc\FdCapitulo`.
 */
class FdCapituloSearch extends FdCapitulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_capitulo', 'orden', 'id_tview_cap', 'id_tcapitulo', 'id_conjunto_pregunta', 'id_comando', 'num_columnas'], 'integer'],
            [['nom_capitulo', 'url', 'consulta', 'icono', 'stylecss', 'numeracion'], 'safe'],
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
        $query = FdCapitulo::find();

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
            'id_capitulo' => $this->id_capitulo,
            'orden' => $this->orden,
            'id_tview_cap' => $this->id_tview_cap,
            'id_tcapitulo' => $this->id_tcapitulo,
            'id_conjunto_pregunta' => $this->id_conjunto_pregunta,
            'id_comando' => $this->id_comando,
            'num_columnas' => $this->num_columnas,
        ]);

        $query->andFilterWhere(['like', 'nom_capitulo', $this->nom_capitulo])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'consulta', $this->consulta])
            ->andFilterWhere(['like', 'icono', $this->icono])
            ->andFilterWhere(['like', 'stylecss', $this->stylecss])
            ->andFilterWhere(['like', 'numeracion', $this->numeracion]);

        return $dataProvider;
    }
    
    public function searcCapFormato($id_fmt,$id_conj_prta,$estado,$capitulo,$id_conj_rpta=null){
        
        if(empty($capitulo)){
            $_capitulos = Yii::$app->db->createCommand('SELECT fd_capitulo.*,
            count(fd_elemento_condicion.id_capitulo_condicionado) as condiciones,
            (
                    select count(conteoresp.id_respuesta) from fd_respuesta as conteoresp
                    where conteoresp.id_formato= :formato 
                    and conteoresp.id_conjunto_respuesta=:id_conj_rpta 
                    and conteoresp.id_conjunto_pregunta= :conj_pregunta
                    and conteoresp.id_capitulo=fd_capitulo.id_capitulo
            ) as respuestas,
            (
                    select count(contepreg.id_pregunta) from fd_pregunta as contepreg
                    where contepreg.id_conjunto_pregunta= :conj_pregunta
                    and contepreg.id_capitulo=fd_capitulo.id_capitulo
            ) as preguntas
            FROM fd_capitulo 
            LEFT JOIN fd_conjunto_pregunta ON fd_conjunto_pregunta.id_conjunto_pregunta=fd_capitulo.id_conjunto_pregunta 
            LEFT JOIN fd_formato ON fd_formato.id_formato=fd_conjunto_pregunta.id_formato 
            LEFT JOIN fd_modulo ON fd_modulo.id_modulo=fd_formato.id_modulo 
            LEFT JOIN fd_adm_estado ON fd_adm_estado.id_modulo=fd_modulo.id_modulo 
            LEFT JOIN fd_elemento_condicion ON fd_elemento_condicion.id_capitulo_condicionado=fd_capitulo.id_capitulo
            LEFT JOIN fd_pregunta ON fd_pregunta.id_conjunto_pregunta=fd_conjunto_pregunta.id_conjunto_pregunta 
            and fd_pregunta.id_pregunta=fd_elemento_condicion.id_pregunta_condicionada
            LEFT JOIN fd_respuesta ON fd_respuesta.id_conjunto_pregunta=fd_pregunta.id_conjunto_pregunta 
            and fd_respuesta.id_pregunta=fd_pregunta.id_pregunta
            and fd_respuesta.id_capitulo=fd_capitulo.id_capitulo
            WHERE fd_conjunto_pregunta.id_formato= :formato
            AND fd_conjunto_pregunta.id_conjunto_pregunta= :conj_pregunta
            AND fd_adm_estado.id_adm_estado = :estado
            GROUP BY fd_capitulo.id_capitulo  
            ORDER BY orden ASC')
                        ->bindValue(':formato',$id_fmt)
                        ->bindValue(':conj_pregunta', $id_conj_prta)
                        ->bindValue(':id_conj_rpta', $id_conj_rpta)
                        ->bindValue(':estado', $estado)  
                        ->queryAll();
        }else{
            
             $_capitulos = Yii::$app->db->createCommand('SELECT fd_capitulo.*,
                 count(fd_elemento_condicion.id_capitulo_condicionado) as condiciones,
                 (
                    select count(conteoresp.id_respuesta) from fd_respuesta as conteoresp
                    where conteoresp.id_formato= :formato 
                    and conteoresp.id_conjunto_respuesta=:id_conj_rpta 
                    and conteoresp.id_conjunto_pregunta= :conj_pregunta
                    and conteoresp.id_capitulo=fd_capitulo.id_capitulo
                ) as respuestas,
                (
                        select count(contepreg.id_pregunta) from fd_pregunta as contepreg
                        where contepreg.id_conjunto_pregunta= :conj_pregunta
                        and contepreg.id_capitulo=fd_capitulo.id_capitulo
                ) as preguntas
            FROM fd_capitulo 
            LEFT JOIN fd_conjunto_pregunta ON fd_conjunto_pregunta.id_conjunto_pregunta=fd_capitulo.id_conjunto_pregunta 
            LEFT JOIN fd_formato ON fd_formato.id_formato=fd_conjunto_pregunta.id_formato 
            LEFT JOIN fd_modulo ON fd_modulo.id_modulo=fd_formato.id_modulo 
            LEFT JOIN fd_adm_estado ON fd_adm_estado.id_modulo=fd_modulo.id_modulo 
            LEFT JOIN fd_elemento_condicion ON fd_elemento_condicion.id_capitulo_condicionado=fd_capitulo.id_capitulo
            LEFT JOIN fd_pregunta ON fd_pregunta.id_conjunto_pregunta=fd_conjunto_pregunta.id_conjunto_pregunta 
            and fd_pregunta.id_pregunta=fd_elemento_condicion.id_pregunta_condicionada
            LEFT JOIN fd_respuesta ON fd_respuesta.id_conjunto_pregunta=fd_pregunta.id_conjunto_pregunta 
            and fd_respuesta.id_pregunta=fd_pregunta.id_pregunta
            and fd_respuesta.id_capitulo=fd_capitulo.id_capitulo
            WHERE fd_conjunto_pregunta.id_formato= :formato
            AND fd_conjunto_pregunta.id_conjunto_pregunta= :conj_pregunta
            AND fd_adm_estado.id_adm_estado = :estado AND fd_capitulo.id_capitulo = :capitulo
            GROUP BY fd_capitulo.id_capitulo  
            ORDER BY orden ASC')
                        ->bindValue(':formato',$id_fmt)
                        ->bindValue(':conj_pregunta', $id_conj_prta)
                        ->bindValue(':id_conj_rpta', $id_conj_rpta)
                        ->bindValue(':estado', $estado)  
                        ->bindValue(':capitulo', $capitulo) 
                        ->queryAll();
        }    
        
        return $_capitulos;
    }
}
