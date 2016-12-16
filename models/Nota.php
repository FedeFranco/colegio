<?php

namespace app\models;

use Yii;
use app\models\Alumno;
use app\models\Asignatura;

/**
 * This is the model class for table "notas".
 *
 * @property integer $id
 * @property string $nota
 * @property integer $alumno_id
 * @property integer $asignatura_id
 *
 * @property Alumnos $alumno
 * @property Asignaturas $asignatura
 */
class Nota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota', 'alumno_id', 'asignatura_id'], 'required'],
            [['nota'], 'number'],
            [['alumno_id', 'asignatura_id'], 'integer'],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
            [['asignatura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asignatura::className(), 'targetAttribute' => ['asignatura_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nota' => 'Nota',
            'alumno_id' => 'Alumno ID',
            'asignatura_id' => 'Asignatura ID',
        ];
    }

    public function poner($alumno,$asignatura,$nota)
    {
        $this->alumno_id = Alumno::find()->select('id')
        ->where(['nombre_alumno'=>$alumno])->scalar();

        $this->asignatura_id = Asignatura::find()
        ->select('id')
        ->where(['nombre_asignatura'=>$asignatura])->scalar();

        $this->nota = $nota;
        //var_dump($this->nota); die();
        $this->save();
        echo 'holap';
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id'])->inverseOf('notas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignatura()
    {
        return $this->hasOne(Asignatura::className(), ['id' => 'asignatura_id'])->inverseOf('notas');
    }
}
