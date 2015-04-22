<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\People;

/**
 * PeopleSearch represents the model behind the search form about `app\models\People`.
 */
class PeopleSearch extends People
{
	
	public $organizationname;
        public $orgid;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'organizationid'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'phone', 'mphone', 'position', 'email', 'organizationname'], 'safe'],
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
        $query = People::find();
		$query->joinWith(['organization']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		$dataProvider->sort->attributes['organizationname'] = [
        'asc' => ['organizations.name' => SORT_ASC],
        'desc' => ['organizations.name' => SORT_DESC],
    ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
          //  'organizationid' => 5,//$this->organization->name,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mphone', $this->mphone])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'organizations.name', $this->organizationname])
            ->andFilterWhere(['like', 'organizationid', $this->orgid]);

        return $dataProvider;
    }
}
