<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sucursal_id')->textInput() ?>

    <?= $form->field($model, 'cuenta_id')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_int')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lada1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lada2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'limite_credito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eliminado')->textInput() ?>

    <?= $form->field($model, 'create_user')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_user')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'delete_user')->textInput() ?>

    <?= $form->field($model, 'delete_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
