<?php

class MemberController extends Controller
{
	public function actionIndex()
	{
		$sql="SELECT * FROM account  JOIN profile USING (id) ORDER BY id ASC";
		$dataProvider=new CSqlDataProvider($sql,array(
				'pagination'=>array(
						'pageSize'=>2,
				)
		));
		$this->render('index',array('dataProvider'=> $dataProvider));
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