<?php

namespace devbrom\releases\models;

use Yii;

/**
 * This is the model class for table "release_project_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Project[] $releaseProjects
 */
class ProjectGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release_project_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleaseProjects()
    {
        return $this->hasMany(Project::className(), ['project_group_id' => 'id']);
    }
}
