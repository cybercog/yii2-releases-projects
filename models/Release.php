<?php

namespace devbrom\releases\models;

use Yii;

/**
 * This is the model class for table "release".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $version
 * @property integer $posted_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Project $project
 * @property Note[] $releaseNotes
 */
class Release extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'version', 'posted_at', 'created_at', 'updated_at'], 'required'],
            [['project_id', 'posted_at', 'created_at', 'updated_at'], 'integer'],
            [['version'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'version' => 'Version',
            'posted_at' => 'Posted At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleaseNotes()
    {
        return $this->hasMany(Note::className(), ['release_id' => 'id']);
    }
}
