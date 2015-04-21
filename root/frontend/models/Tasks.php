<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property integer $taskid
 * @property string $name
 * @property string $term
 * @property integer $userid
 * @property integer $stage
 * @property integer $resultid
 * @property integer $typeid
 * @property string $creationdate
 * @property string $updatedate
 *
 * @property Tasks $task
 * @property Tasks[] $tasks
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taskid', 'name', 'term', 'userid', 'stage', 'resultid', 'typeid', 'creationdate', 'updatedate'], 'required'],
            [['taskid', 'userid', 'stage', 'resultid', 'typeid'], 'integer'],
            [['name'], 'string'],
            [['term', 'creationdate', 'updatedate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taskid' => 'Taskid',
            'name' => 'Name',
            'term' => 'Term',
            'userid' => 'Userid',
            'stage' => 'Stage',
            'resultid' => 'Resultid',
            'typeid' => 'Typeid',
            'creationdate' => 'Creationdate',
            'updatedate' => 'Updatedate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'taskid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::className(), ['taskid' => 'id']);
    }
}
