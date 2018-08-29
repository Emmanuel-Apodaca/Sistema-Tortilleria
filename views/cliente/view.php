<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'sucursal_id' => $model->sucursal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'sucursal_id' => $model->sucursal_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sucursal_id',
            'cuenta_id',
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
            'create_user',
            'create_time',
            'update_user',
            'update_time',
            'delete_user',
            'delete_time',
        ],
    ]) ?>

</div>
