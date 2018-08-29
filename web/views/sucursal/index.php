<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SucursalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sucursals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sucursal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sucursal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_domicilio',
            'nombre',
            'calle',
            'numero_ext',
            //'numero_int',
            //'cp',
            //'colonia',
            //'estado',
            //'ciudad',
            //'telefono1',
            //'telefono2',
            //'fax',
            //'email:email',
            //'logotipo',
            //'web',
            //'rfc',
            //'asignada',
            //'eliminado',
            //'create_user',
            //'create_time',
            //'update_user',
            //'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
