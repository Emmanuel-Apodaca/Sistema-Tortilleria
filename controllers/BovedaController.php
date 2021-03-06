<?php

namespace app\controllers;

use Yii;
use app\models\Boveda;
use app\models\BovedaSearch;
use app\models\EstadoCaja;
use app\models\RegistroSistema;
use app\models\Privilegio;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BovedaController implements the CRUD actions for Boveda model.
 */
class BovedaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Boveda models.
     * @return mixed
     */
    public function actionIndex()
    {
      $searchModel = new BovedaSearch();
      $id_current_user = Yii::$app->user->identity->id;

      $privilegio = Yii::$app->db->createCommand('SELECT * FROM privilegio WHERE id_usuario = '.$id_current_user)->queryAll();
      $totalBoveda = Yii::$app->db->createCommand('SELECT Sum(efectivo) FROM boveda AS Boveda')->queryAll();
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      $estado_caja = new EstadoCaja();
      $estado_caja = Yii::$app->db->createCommand('SELECT * FROM estado_caja WHERE id = 1')->queryAll();

      return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          'estado_caja' => $estado_caja,
          'privilegio'=>$privilegio,
          'totalBoveda'=>$totalBoveda,
      ]);
    }

    /**
     * Displays a single Boveda model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Boveda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $id_current_user = Yii::$app->user->identity->id;
      $privilegio = Yii::$app->db->createCommand('SELECT * FROM privilegio WHERE id_usuario = '.$id_current_user)->queryAll();

      if($privilegio[0]['movimientos_caja'] == 1){

        $model = new Boveda();
        $registroSistema= new RegistroSistema();
        if ($model->load(Yii::$app->request->post()))
        {
          $totalBoveda = Yii::$app->db->createCommand('SELECT Sum(efectivo) FROM boveda AS Boveda')->queryAll();
          $model->create_user=Yii::$app->user->identity->id;
          $model->create_time=date('Y-m-d H:i:s');

          if($model->tipo_movimiento == 1){
            $model->efectivo=-($model->efectivo);
            $registroSistema->descripcion = Yii::$app->user->identity->nombre ." retiró $".-($model->efectivo). ' de la bóveda';
            $registroSistema->id_sucursal = 1;
          }
          else{
            $model->efectivo= $model->efectivo;
            $registroSistema->descripcion = Yii::$app->user->identity->nombre ." ingresó $".$model->efectivo. ' a la bóveda';
            $registroSistema->id_sucursal = 1;
          }

            if($model->save() && $registroSistema->save())
            {
                  $searchModel = new BovedaSearch();
                  $estado_caja = Yii::$app->db->createCommand('SELECT * FROM estado_caja WHERE id = 1')->queryAll();
                  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                  return $this->redirect(['index', [
                      'searchModel' => $searchModel,
                      'dataProvider' => $dataProvider,
                      'estado_caja' => $estado_caja,
                      'totalBoveda'=>$totalBoveda,
                  ]]);
            }
          }
        }
        else{
          return $this->redirect(['index']);
        }
      return $this->renderAjax('create', [
          'model' => $model,
      ]);
    }

    /**
     * Updates an existing Boveda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Boveda model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Boveda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Boveda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Boveda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
