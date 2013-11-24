<?php

class MemberGridController extends Controller
{
	public function actionIndex()
	{
		$sql ="SELECT account.id,account.username,profile.firstname,profile.lastname ";
		$sql .="FROM account INNER JOIN profile ON account.id = profile.id ";
		$sql .="ORDER BY account.id ASC";
		$dataProvider = new CSqlDataProvider($sql, array(
				'pagination' => array(
						'pageSize' => 10,
				),
				'sort' => array(
						'attributes' => array(
								'id',
								'username',
								'firstname',
								'lastname'
						),
				),
		));
		$this->render('index', array('dataProvider'=>$dataProvider));

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
}