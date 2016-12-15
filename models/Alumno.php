<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property integer $id
 * @property string $nombre_alumno
 * @property string $edad
 *
 * @property Notas[] $notas
 */
class Alumno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_alumno'], 'required'],
            [['edad'], 'number'],
            [['nombre_alumno'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_alumno' => 'Nombre Alumno',
            'edad' => 'Edad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['alumno_id' => 'id'])->inverseOf('alumno');
    }
}
