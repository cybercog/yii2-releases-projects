<?php

namespace devbrom\releases\models;

use Yii;

/**
 * This is the model class for table "release_note".
 *
 * @property integer $id
 * @property integer $release_id
 * @property integer $note_type_id
 * @property string $title
 * @property integer $order_index
 *
 * @property Release $release
 * @property NoteType $noteType
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'release_note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['release_id', 'note_type_id', 'title', 'order_index'], 'required'],
            [['release_id', 'note_type_id', 'order_index'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'release_id' => 'Release ID',
            'note_type_id' => 'Note Type ID',
            'title' => 'Title',
            'order_index' => 'Order Index',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelease()
    {
        return $this->hasOne(Release::className(), ['id' => 'release_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoteType()
    {
        return $this->hasOne(NoteType::className(), ['id' => 'note_type_id']);
    }
}
