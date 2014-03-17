<?php

class MapController extends Controller
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
				'actions'=>array(null),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete','test','addnode','getjsonnodes'),
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
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Map;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Map']))
		{
			$model->attributes=$_POST['Map'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Map']))
		{
			$model->attributes=$_POST['Map'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Map');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Map('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Map']))
			$model->attributes=$_GET['Map'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionGetJsonNodes(){
		$model=Map::model()->findAll();
		$arr=array();
		foreach($model as $record){
			$ele=array();
			$ele['name']=$record['name'];
			$ele['lng']=$record['lng'];
			$ele['lat']=$record['lat'];
			$ele['tel']=$record['tel'];
			$ele['state']=$record['state'];
			array_push($arr,$ele);
		}
		$json=json_encode($arr);
		print_r($json);		
	}
	
	public function actionAddNode(){
		$model=new Map;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Map']))
		{
			$model->attributes=$_POST['Map'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('addnode',array(
			'model'=>$model,
		));
	}
	
	public function actionChangeState(){
		$tel=$_GET['tels'];
		$body=$_GET['body'];
		$changed=false;
		if ($body=="IOOP7,2"){
			$state=0;
			$changed=true;
		}else if ($body=="IOOP6,2"){
			$state=1;
			$changed=true;
		}
		if ($changed){
			Map::model()->updateAll(
				array('state'=>$state),
				'tel=:tel',
				array(':tel'=>$tel)
			);
		}
	}
	
	public function actionTest()
	{
		$this->render('test');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Map the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Map::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Map $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='map-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
