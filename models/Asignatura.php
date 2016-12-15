<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaturas".
 *
 * @property integer $id
 * @property string $nombre_asignatura
 *
 * @property Notas[] $notas
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignaturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_asignatura'], 'required'],
            [['nombre_asignatura'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_asignatura' => 'Nombre Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['asignatura_id' => 'id'])->inverseOf('asignatura');
    }
}
