<?php
namespace app\controllers;
use app\models\NotaForm;
use app\models\Nota;
use Yii;


class NotasController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCalificar()
    {
        $model = new NotaForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            # code...
            $calif = new Nota;
            if ($calif->poner($model->alumno,$model->asignatura,$model->nota)) {
                # code...
                //return $this->render('calificar',['model'=>$model]);
                echo "hola";
            }else {
                # code...
                echo "hola 3";
            }
    }else {
        return $this->render('calificar',['model'=>$model]);
    }
    }

    public function actionPito()
    {
        return $this->render('pito');
    }

}
