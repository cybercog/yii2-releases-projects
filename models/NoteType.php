<?php

namespace devbrom\releases\models;

use Yii;

/**
 * This is the model class for table "release_note_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Note[] $releaseNotes
 */
class NoteType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release_note_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReleaseNotes()
    {
        return $this->hasMany(Note::className(), ['note_type_id' => 'id']);
    }
}
