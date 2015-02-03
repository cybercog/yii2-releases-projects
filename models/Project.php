<?php

namespace devbrom\releases\models;

use Yii;

/**
 * This is the model class for table "release_project".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $project_group_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Release[] $releases
 * @property ProjectGroup $projectGroup
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'project_group_id', 'created_at', 'updated_at'], 'required'],
            [['project_group_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['alias'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'project_group_id' => 'Project Group ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleases()
    {
        return $this->hasMany(Release::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectGroup()
    {
        return $this->hasOne(ProjectGroup::className(), ['id' => 'project_group_id']);
    }
}
