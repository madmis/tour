<?php

class RequestController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $defaultAction = 'admin';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$model = $this->loadModel($id);
		if (Yii::app()->user->checkAccess('Request.View', array('id'=>$model->officer))) {
			$this->render('view', array(
				'model' => $model,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		if (Yii::app()->user->checkAccess('Request.Create')) {
			$model = new Request;
			// Определяем номер новой заявки
			$model->number = $this->getNextNumber();
			$model->buyer = '';
			$model->officer = Yii::app()->user->getId();
			$model->officer_name = Yii::app()->user->getName();

			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if (isset($_POST['Request'])) {
				$model->attributes = $_POST['Request'];
				if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('create', array(
				'model' => $model,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);
		if (Yii::app()->user->checkAccess('Request.Update', array('id'=>$model->officer))) {
			$model->date = DateHelper::getFormatedDate($model->date);
			$model->pay_date = DateHelper::getFormatedDate($model->pay_date);

			// Uncomment the following line if AJAX validation is needed
			 $this->performAjaxValidation($model);

			if (isset($_POST['Request'])) {
				$model->attributes = $_POST['Request'];
				if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->id));
				}
			}

			$this->render('update', array(
				'model' => $model,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$model = $this->loadModel($id);
		if (Yii::app()->user->checkAccess('Request.Delete', array('id'=>$model->officer))) {
			if (Yii::app()->request->isPostRequest) {
				// we only allow deletion via POST request
				$model->delete();

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if (!isset($_GET['ajax'])) {
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
				}
			} else {
				throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
			}
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		if (Yii::app()->user->checkAccess('Request.Index')) {
			$dataProvider = new CActiveDataProvider('Request');
			$this->render('index', array(
				'dataProvider' => $dataProvider,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		if (Yii::app()->user->checkAccess('Request.Admin')) {
			//$model = new Request('search');
			$model = Request::model();
			$fAll = $model->with('currency_rate0', 'currency_cid')->findAll();
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Request'])) {
				$model->attributes = $_GET['Request'];
			}

			// если пользователь не суперадмин, выводим только его записи
			if (!Rights::getAuthorizer()->isSuperuser(Yii::app()->user->getId())) {
				$model->officer = Yii::app()->user->getId();
			}
			// Выбираем только неархивные заявки
			$model->archived = 0;

			$this->render('admin', array(
				'model' => $model,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Вывод архивных заявок
	 */
	public function actionArchived() {
		if (Yii::app()->user->checkAccess('Request.Archived')) {
			$model = new Request('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Request'])) {
				$model->attributes = $_GET['Request'];
			}

			// если пользователь не суперадмин, выводим только его записи
			if (!Rights::getAuthorizer()->isSuperuser(Yii::app()->user->getId())) {
				$model->officer = Yii::app()->user->getId();
			}
			// Выбираем только архивные заявки
			$model->archived = 1;

			$this->render('archived', array(
				'model' => $model,
			));
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Request::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'request-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Получает следующий допустимый номер заявки
	 * @return int номер
	 */
	protected function getNextNumber() {
		$criteria = new CDbCriteria;
		$criteria->select = 'MAX(number) number';
		$request = Request::model()->find($criteria);
		return ($request->number !== null) ? ++$request->number : 1;
	}

}
