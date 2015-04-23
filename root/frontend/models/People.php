<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "people".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $phone
 * @property string $mphone
 * @property string $position
 * @property integer $organizationid
 * @property string $email
 *
 * @property Organizations[] $organizations
 * @property Organizations $organization
 */
class People extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'middlename', 'phone', 'mphone', 'position', 'organizationid', 'email'], 'required'],
            [['organizationid'], 'integer'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 300],
            [['phone', 'mphone'], 'string', 'max' => 20],
            [['position'], 'string', 'max' => 1000],
            [['email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'middlename' => 'Отчество',
            'phone' => 'Телефон',
            'mphone' => 'Мобильный телефон',
            'position' => 'Должность',
            'organizationname' => 'Организация',
			'organizationid' => 'Организация',
            'email' => 'Email',
			'isdirector'=>'директор'
			
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organizations::className(), ['directorid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organizations::className(), ['id' => 'organizationid']);
    }
	
	public function getFio()
	{
		return $this->firstname.' '.$this->middlename.' '.$this->lastname;
	}
	
	public function getOrganizationname()
	{
		return $this->getOrganization()->name;
	}
    
	public function getIsdirector()
	{
        //     xdebug_break(); 
        	if($this->getOrganizations()->count()>0) return true;
                else return false;
	}
        public function setIsdirector($c)
        {
                $org=Organizations::findOne($this->organizationid);
                if($c){$org->directorid=$this->id;}
                else {$org->directorid=0;}
                $org->save();
        }
       
        public function load($data, $formName = NULL)
        {
            if(isset($data['People']['isdirector']))
            {
                $this->setIsdirector($data['People']['isdirector']);
            }
            return parent::load($data, $formName = NULL);
        }
    
}