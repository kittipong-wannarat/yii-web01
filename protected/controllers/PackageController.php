<?php

class PackageController extends Controller
{
	public function actionIndex()
	{
		if (empty($id)) {
			$model = new Package;
		}
		$dataProvider = new CActiveDataProvider('Package', array(
				'pagination' => array(
				'pageSize'=> 20,
				),
		));
		$this->render('index', array('model'=>$model,'dataProvider' =>$dataProvider));
		
	}
	public function actionSave($id='') {
		
		$model = new Package;
		$model->attributes = $_POST['Package'];
		$res = $model->save();
		if ($res) {
			echo 'Already Created. ';
		}else  {
			echo 'Error: '.print_r($model->getErrors(),true);
			Yii::app()->end();
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}