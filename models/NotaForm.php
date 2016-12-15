<?php
namespace app\models;
use yii\base\Model;

class NotaForm extends Model
{
    public $alumno;
    public $asignatura;
    public $nota;

    public function rules()
    {
        return[
            [['alumno','asignatura'],'required'],

        ];
    }

    public function attributeLabels()
    {
        return[
            'alumno'=>'Alumno',
            'asignatura'=>'Asignatura',
            'nota'=>'Nota',
        ];
    }
}
