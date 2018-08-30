<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use kartik\editable\Editable;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proveedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedor-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col-md-6">
        <?php
        $user= new User();
            echo DetailView::widget([
                'model'=>$model,
                'condensed'=>true,
                'hover'=>true,
                'mode'=>DetailView::MODE_VIEW,
                'deleteOptions'=>[
                  'params'=>['id' => $model->id],
                  'url'=> ['delete', 'id' => $model->id],
                  'data'=> [
                    //'confirm'=>'¿Está seguro que desea eliminar esta habitación?',
                    'method'=>'post',
                  ],
                ],
                'panel'=>[
                    'heading'=>'Huesped </br>' . $model->nombre,
                    'type'=>DetailView::TYPE_INFO,
                ],
                'attributes'=>
                [
                  'id',
                  'sucursal_id',
                  'nombre',
                  'razon_social',
                  'rfc',
                  'calle',
                  'num_ext',
                  'num_int',
                  'colonia',
                  'ciudad',
                  'estado',
                  'cp',
                  'telefono1',
                  'telefono2',
                  'email:email',
                  'lada1',
                  'lada2',
                  'tipo',
                  'limite_credito',
                  'eliminado',
                    [
                        'attribute'=>'create_user',
                        'format'=>'raw',
                        'value'=>$user->obtenerNombre($model->create_user),
                        'displayOnly'=>true,
                    ],
                    [
                        'attribute'=>'create_time',
                        'format'=>'date',
                        'value'=>$model->create_time,
                        'displayOnly'=>true,
                    ],
                    'update_user',
                    'update_time',
                ]
            ]);

        ?>
        </div>

</div>
