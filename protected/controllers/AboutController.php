<?php

class AboutController extends Controller {

	public function actionIndex() {
		if (Yii::app()->user->checkAccess('About.Index')) {
			$data = array(
				'id'=>1,
				'appName'=>CHtml::encode(Yii::app()->name),
				'developer'=>'<a href="http://sd-group.org.ua/">SD-Group</a>',
				'version'=>1.0,
				'phpversion'=>phpversion(),
				'driver'=>Yii::app()->db->getDriverName(),
				'serverDb'=>Yii::app()->db->getServerVersion(),
				'tableType'=>'InnoDb',
				'time'=>sprintf('%0.5f',Yii::getLogger()->getExecutionTime()),
				'memory'=>number_format(Yii::getLogger()->getMemoryUsage()/1024),
				'powered'=>Yii::powered(),
			);

			$this->render('index', array('data'=>$data));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}
}