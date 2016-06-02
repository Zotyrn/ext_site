<?php

namespace app\modules\video\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\video\models\VideoLimits;

/**
 * VideoLimitsSearch represents the model behind the search form about `app\modules\video\models\VideoLimits`.
 */
class VideoLimitsSearch extends VideoLimits
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = VideoLimits::find()->joinWith(['type']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
