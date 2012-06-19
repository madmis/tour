<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column1';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	
	public $dialog = array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	/**
	 * Переопределенный метод класса CController
	 * В методе проверяется авторизация пользователей
	 * @param CAction $action the action to be executed.
	 * @return true, если пользователь не авторизован выполняется переадресация  на авторизацию
	 */
	/* protected function beforeAction($action) {
	  parent::beforeAction($action);
	  //$auth = Yii::app()->authManager;
	  //$role = $auth->createAuthItem("admin", 2);
	  //$auth->save();



	  $url = $this->id . '/' . $action->id;
	  $lurl = is_array(Yii::app()->user->loginUrl) ? Yii::app()->user->loginUrl[0] : Yii::app()->user->loginUrl;
	  $lurl = ltrim($lurl, '/');
	  if (Yii::app()->user->isGuest && $url !== $lurl) {
	  Yii::app()->user->loginRequired();
	  }
	  return true;
	  } */

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function accessRules() {
		return array(
			// Разрешаем анонимным пользователям действие "авторизация"
			array('allow',
				'actions' => array('login', 'error'),
				'users' => array('?'),
			),
			// запрещаем аутентифицированным пользователям действие "авторизация"
			array('deny',
				'actions' => array('login'),
				'users' => array('@'),
			),
			// запрещаем анонимным пользователям все действия
			array('deny',
				'users' => array('?'),
			),
		);
	}
}