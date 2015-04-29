<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requisite".
 *
 * @property integer $id
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 * @property string $bank
 * @property string $account
 *
 * @property Organizations $organization
 */
class Requisite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requisite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'inn', 'kpp', 'bank', 'account'], 'required'],
            [['inn'], 'string', 'max' => 10],
            [['kpp'], 'string', 'max' => 9],
            [['ogrn', 'account'], 'string', 'max' => 20],
            [['bank'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organizationid' => 'Организация',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',
            'bank' => 'Банк',
            'account' => 'Расчетный счет',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['reqid' => 'id']);
    }
}
