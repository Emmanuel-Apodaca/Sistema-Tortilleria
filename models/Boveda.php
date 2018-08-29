<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boveda".
 *
 * @property int $id
 * @property string $efectivo
 * @property string $descripcion
 * @property int $tipo_movimiento
 * @property int $create_user
 * @property string $create_time
 */
class Boveda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'boveda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['efectivo'], 'number'],
            [['descripcion'], 'required'],
            [['tipo_movimiento', 'create_user'], 'integer'],
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
            'efectivo' => 'Efectivo',
            'descripcion' => 'Descripcion',
            'tipo_movimiento' => 'Tipo Movimiento',
            'create_user' => 'Create User',
            'create_time' => 'Create Time',
        ];
    }
}
