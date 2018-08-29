<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $id
 * @property int $sucursal_id
 * @property int $cuenta_id
 * @property string $nombre
 * @property string $razon_social
 * @property string $rfc
 * @property string $calle
 * @property string $num_ext
 * @property string $num_int
 * @property string $colonia
 * @property string $ciudad
 * @property string $estado
 * @property string $cp
 * @property string $telefono1
 * @property string $telefono2
 * @property string $email
 * @property string $lada1
 * @property string $lada2
 * @property int $tipo Tipos de proveedores-Proveedor con crédito-Proveedor sin crédi
 * @property string $limite_credito
 * @property int $eliminado
 * @property int $create_user
 * @property string $create_time
 * @property int $update_user
 * @property string $update_time
 * @property int $delete_user
 * @property string $delete_time
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sucursal_id'], 'required'],
            [['sucursal_id', 'cuenta_id', 'tipo', 'eliminado', 'create_user', 'update_user', 'delete_user'], 'integer'],
            [['limite_credito'], 'number'],
            [['create_time', 'update_time', 'delete_time'], 'safe'],
            [['nombre', 'razon_social', 'rfc', 'calle', 'colonia', 'ciudad', 'estado', 'telefono1', 'telefono2', 'email', 'lada1', 'lada2'], 'string', 'max' => 45],
            [['num_ext', 'num_int'], 'string', 'max' => 20],
            [['cp'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sucursal_id' => 'Sucursal ID',
            'cuenta_id' => 'Cuenta ID',
            'nombre' => 'Nombre',
            'razon_social' => 'Razon Social',
            'rfc' => 'Rfc',
            'calle' => 'Calle',
            'num_ext' => 'Num Ext',
            'num_int' => 'Num Int',
            'colonia' => 'Colonia',
            'ciudad' => 'Ciudad',
            'estado' => 'Estado',
            'cp' => 'Cp',
            'telefono1' => 'Telefono1',
            'telefono2' => 'Telefono2',
            'email' => 'Email',
            'lada1' => 'Lada1',
            'lada2' => 'Lada2',
            'tipo' => 'Tipo',
            'limite_credito' => 'Limite Credito',
            'eliminado' => 'Eliminado',
            'create_user' => 'Create User',
            'create_time' => 'Create Time',
            'update_user' => 'Update User',
            'update_time' => 'Update Time',
            'delete_user' => 'Delete User',
            'delete_time' => 'Delete Time',
        ];
    }
}
