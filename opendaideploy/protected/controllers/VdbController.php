<?php
Yii::import('application.vendor.*');
require_once 'restmco/restmco.class.php';

class VdbController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','file'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','deploy'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'tables' => Vdbtables::model()->findAllByAttributes(array('vdb_id'=>$id,)),
			'vdbdsres' => VdbDsRes::model()->findByAttributes(array('vdb_id'=>$id,)),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::import('ext.multimodelform.MultiModelForm');
		
		$model=new Vdb;
		$table = new Vdbtables;
		$vdb_ds_res = new VdbDsRes;
		$validatedItems = array();
		$errorIndexes = null;
		$validatedItems1 = array();
		$errorIndexes1 = null;
		$updateItems = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vdb']))
		{
			$model->attributes = $_POST['Vdb'];
			$model->uploadFile();
			if($model->save())
				//the value for the foreign key 'vdb_id'
				$masterValues = array ('vdb_id'=>$model->id);
				$masterValues1 = array ('vdb_id'=>$model->id);
				if (MultiModelForm::save($table,$validatedItems,$errorIndexes,$masterValues) && MultiModelForm::save($vdb_ds_res,$validatedItems1,$errorIndexes1,$masterValues1)){
					$this->redirect(array('view','id'=>$model->id));
				}
		}

		$this->render('create',array(
			'model'=>$model,
			'table'=>$table,
			'vdbdsres'=>$vdb_ds_res,
			'errorIndexes' => $errorIndexes,
			'validatedItems' => $validatedItems,
			'errorIndexes1' => $errorIndexes1,
			'validatedItems1' => $validatedItems1,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		Yii::import('ext.multimodelform.MultiModelForm');
		$model=$this->loadModel($id);
		
		$table = new Vdbtables;
		$vdb_ds_res = new VdbDsRes;
		$validatedItems = array();
		$errorIndexes = null;
		$validatedItems1 = array();
		$errorIndexes1 = null;
		$updateItems = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vdb']))
		{
			$oldfilename = $model->vdbfile; // let's store original filename (if it was defined)
			$model->attributes=$_POST['Vdb'];
			//the foreign key values for the member
			$masterValues = array ('vdb_id'=>$model->id);
			$masterValues1 = array ('vdb_id'=>$model->id);

			// Now check if there was anything uploaded and store new name if so
/*			$uploadedfile = CUploadedFile::getInstance($model,'vdbfile');
			if (is_object($file) && get_class($file)==='CUploadedFile') {			
				$model->vdbfile = $uploadedfile;
			} else {
				$model->vdbfile = $oldfilename;
			}
			*/
			$model->uploadFile();

			if($model->save() && MultiModelForm::save($table,$errorIndexes,$updateItems,$masterValues) && MultiModelForm::save($vdb_ds_res,$validatedItems1,$errorIndexes1,$masterValues1)){
			/*	if(!empty($uploadedfile)){
					$uploadedfile->saveAs(Yii::app()->basepath.'/'.$model->vdbfile);
					if ($oldfilename != $model->filename->name) {
						unlink($model->fileWithPath(Yii::app()->basePath . '/' . $oldfilename));
					}
					
				}*/
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			//submit the member, errorIndexes, validatedItems to the widget in the edit form
			'table'=>$table, 
			'vdbdsres'=>$vdb_ds_res,
			'errorIndexes' => $errorIndexes,
			'validatedItems' => $updateItems,
			'errorIndexes1' => $errorIndexes1,
			'validatedItems1' => $validatedItems1,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Vdb');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vdb('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vdb']))
			$model->attributes=$_GET['Vdb'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vdb the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Vdb::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vdb $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vdb-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDeploy($id){
		$mco = new restmco('http://puppet.test.italy.cloudlabcsi.local:4567');
		
		$ret = $mco->call_agent('rpcutil', 'ping');
		error_log(print_r($ret,true));
		echo print_r('ret :'.$ret, true);
		echo print_r('result :'.$mco->result, true);
		echo print_r('error :'.$mco->error_message, true);
		echo print_r('error_code :'.$mco->error_code, true);
		Yii::app()->end();
	}
	
	public function actionFile($id) {
		$model = $this->loadModel($id);	
		if (file_exists($model->getFilePath())) {
			header("Pragma: no-cache");
			header("Expires: 0");
			header('Content-Description: File Transfer');
			header('Content-Type: ' . CFileHelper::getMimeType($model->getFilePath()));
			header('Content-Disposition: attachment; filename="'.$model->vdbfile.'"');
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($model->getFilePath()));		
			readfile($model->getFilePath());			
			Yii::app()->end();
		} else {
			throw new CHttpException(404, 'Not found');
		}
	}
	
}
