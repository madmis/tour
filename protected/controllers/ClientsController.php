<?php

class ClientsController extends Controller {

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
		if (Yii::app()->user->checkAccess('Clients.View')) {
			$this->render('view', array(
				'model' => $this->loadModel($id),
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
		if (Yii::app()->user->checkAccess('Clients.Create')) {
			$model = new Clients;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if (isset($_POST['Clients'])) {
				$model->attributes = $_POST['Clients'];
				if ($model->save())
					$this->redirect(array('view', 'id' => $model->id));
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
		if (Yii::app()->user->checkAccess('Clients.Update')) {
			$model = $this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if (isset($_POST['Clients'])) {
				$model->attributes = $_POST['Clients'];
				if ($model->save())
					$this->redirect(array('view', 'id' => $model->id));
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
		if (Yii::app()->user->checkAccess('Clients.Delete')) {
			if (Yii::app()->request->isPostRequest) {
				// we only allow deletion via POST request
				$this->loadModel($id)->delete();

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if (!isset($_GET['ajax']))
					$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
			else
				throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		if (Yii::app()->user->checkAccess('Clients.Index')) {
			$dataProvider = new CActiveDataProvider('Clients');
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
		if (Yii::app()->user->checkAccess('Clients.Admin')) {
			$model = new Clients('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Clients'])) {
				$model->attributes = $_GET['Clients'];
			}
			
			if (isset($_GET['ajax']) && $_GET['ajax'] === 'select-clients-grid') {
				$this->renderPartial('dialog/selectGrid', array('model' => $model));
			} else {
				$this->render('admin', array('model' => $model));
			}
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
		$model = Clients::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'clients-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Выбор клиента из грида в диалоге
	 */
	public function actionDialogSelect() {
		if (Yii::app()->user->checkAccess('Clients.DialogSelect')) {
			$model = new Clients('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Clients'])) {
				$model->attributes = $_GET['Clients'];
			}

			if (isset($_GET['ajax']) && $_GET['ajax'] === 'select-clients-grid') {
				$this->renderPartial('dialog/selectGrid', array('model' => $model));
			} else {
				throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
			}
		} else {
			throw new CHttpException(403, Yii::t("yii", "You are not authorized to perform this action."));
		}
	}
}
