<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property int $id
 * @property int $id_sucursal
 * @property string $efectivo
 * @property string $voucher
 * @property string $descripcion
 * @property int $tipo_movimiento
 * @property int $tipo_pago
 * @property int $create_user
 * @property string $create_time
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'efectivo', 'voucher', 'descripcion'], 'required'],
            [['id_sucursal', 'tipo_movimiento', 'tipo_pago', 'create_user'], 'integer'],
            [['efectivo', 'voucher'], 'number'],
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
            'efectivo' => 'Efectivo',
            'voucher' => 'Voucher',
            'descripcion' => 'Descripcion',
            'tipo_movimiento' => 'Tipo Movimiento',
            'tipo_pago' => 'Tipo Pago',
            'create_user' => 'Create User',
            'create_time' => 'Create Time',
        ];
    }
}
