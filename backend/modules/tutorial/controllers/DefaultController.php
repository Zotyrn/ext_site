<?php

namespace app\modules\tutorial\controllers;

use Yii;
use app\modules\tutorial\models\Tutorial;
use app\modules\tutorial\models\TutorialSerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use vova07\imperavi\actions\GetAction as ImperaviGet;
use vova07\imperavi\actions\UploadAction as ImperaviUpload;

/**
 * DefaultController implements the CRUD actions for Tutorial model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
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
    
    public function actions()
    {
        return [
//            'imperavi-get' => [
//                'class' => ImperaviGet::className(),
//                'url' => $this->module->contentUrl,
//                'path' => $this->module->contentPath
//            ],
//            'imperavi-image-upload' => [
//                'class' => ImperaviUpload::className(),
//                'url' => $this->module->contentUrl,
//                'path' => $this->module->contentPath
//            ],
//            'imperavi-file-upload' => [
//                'class' => ImperaviUpload::className(),
//                'url' => $this->module->fileUrl,
//                'path' => $this->module->filePath,
//                'uploadOnlyImage' => false
//            ],
            'fileapi-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@statics/web/tutorial/logo/'
            ]
        ];
    }

    /**
     * Lists all Tutorial models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TutorialSerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutorial model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tutorial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tutorial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tutorial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tutorial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutorial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tutorial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tutorial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}