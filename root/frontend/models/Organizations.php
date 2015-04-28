<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizations".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $name
 * @property integer $reqid
 * @property integer $directorid
 *
 * @property People $director
 * @property Req $req
 * @property People[] $peoples
 */
class Organizations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organizations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'name'], 'required'],
            [['fullname'], 'string'],
            [['reqid', 'directorid'], 'integer'],
            [['name'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Полное намименование организации',
            'name' => 'Имя организации',
            'reqid' => 'Реквизиты',
            'directorid' => 'Директор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(People::className(), ['id' => 'directorid']);
    }
	

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisite()
    {
        return $this->hasOne(Requisite::className(), ['id' => 'reqid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::className(), ['organizationid' => 'id']);
    }
	
	public static function loadxml($file)
	{
	if (file_exists($file)) {
		$xml = simplexml_load_file($file);
	//	$xml->
		 foreach ($xml->Контрагент as $org)
		{
			
				//print_r($org);
				//echo $org['Наименование'];
				$model=new Organizations();
                                $model->fullname=$org['Наименование'];
                                $model->save();
			
			
		}
	}
		//return $xml;
	}
}
