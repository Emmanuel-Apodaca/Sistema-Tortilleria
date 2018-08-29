<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sucursal_id',
            'cuenta_id',
            'nombre',
            'razon_social',
            //'rfc',
            //'calle',
            //'num_ext',
            //'num_int',
            //'colonia',
            //'ciudad',
            //'estado',
            //'cp',
            //'telefono1',
            //'telefono2',
            //'email:email',
            //'lada1',
            //'lada2',
            //'tipo',
            //'limite_credito',
            //'eliminado',
            //'create_user',
            //'create_time',
            //'update_user',
            //'update_time',
            //'delete_user',
            //'delete_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
