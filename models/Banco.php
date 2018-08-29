<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banco".
 *
 * @property int $id
 * @property int $id_sucursal
 * @property int $id_cuenta
 * @property string $total
 * @property string $descripcion
 * @property int $tipo_movimiento
 * @property int $tipo_pago
 * @property int $create_user
 * @property string $create_time
 */
class Banco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'id_cuenta', 'total', 'descripcion'], 'required'],
            [['id_sucursal', 'id_cuenta', 'tipo_movimiento', 'tipo_pago', 'create_user'], 'integer'],
            [['total'], 'number'],
            [['create_time'], 'safe'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sucursal' => 'Id Sucursal',
            'id_cuenta' => 'Id Cuenta',
            'total' => 'Total',
            'descripcion' => 'Descripcion',
            'tipo_movimiento' => 'Tipo Movimiento',
            'tipo_pago' => 'Tipo Pago',
            'create_user' => 'Create User',
            'create_time' => 'Create Time',
        ];
    }
}
