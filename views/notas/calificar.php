<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Calificar a un Alumno</h1>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model,'alumno') ?>
<?= $form->field($model,'asignatura') ?>
<?= $form->field($model,'nota') ?>

<?=Html::submitButton('Calificar',['class'=>'btn btn-success']) ?>

<?php $form = ActiveForm::end()?>
