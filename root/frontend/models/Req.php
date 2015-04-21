<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "req".
 *
 * @property integer $id
 * @property integer $inn
 * @property integer $kpp
 * @property integer $bankname
 * @property integer $koracc
 *
 * @property Organizations[] $organizations
 */
class Req extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'req';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inn', 'kpp', 'bankname', 'koracc'], 'required'],
            [['inn', 'kpp', 'bankname', 'koracc'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inn' => 'Inn',
            'kpp' => 'Kpp',
            'bankname' => 'Bankname',
            'koracc' => 'Koracc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['reqid' => 'id']);
    }
}
