<?php

class UserActionLogController extends Controller {

	public $defaultAction = 'admin';
	public $layout = '//layouts/column1';

	public function actionAdmin() {
		$model = new AuditTrail('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['AuditTrail'])) {
			$model->attributes = $_GET['AuditTrail'];
		}
		$this->render('admin', array('model' => $model,));
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