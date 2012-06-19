<?php

Yii::import('bootstrap.widgets.BootModal');

/**
 * Use:
 *  $this->widget('ext.selectDialog.SelectDialog', array('model'=>'Currency'), true);
 * 
 * 
 * @author Dimon
 */
class SelectDialog extends CWidget {

	/**
	 * @var string Название модели (первая буква в верхнем регистре)
	 */
	public $model = null;
	/**
	 * @var string id (html-атрибут) поля в которое будет перенесен id выбраной записи
	 */
	public $fieldId = null;
	/**
	 * @var string id (html-атрибут) поля в которое будет перенесен name выбраной записи
	 */
	public $fieldName = null;
	/**
	 * @var string Заголовок диалогв
	 */
	public $title = null;
	/**
	 * @var string результат вывода представления грида
	 */
	public $grid = null;
	/**
	 * @var mixed Экземпляр контроллера
	 */
	public $controller = null;

	protected $_assetsUrl;

	/**
	 * Initializes the widget.
	 */
	public function init() {
		parent::init();
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		$this->registerScriptFile('jquery.selectDialog.js');

		if ($this->model == null) {
			throw new Exception('Не указано название класса модели для виджета');
		} else {
			$this->model = ucfirst($this->model);
		}

		$this->createController();
		$this->grid = $this->controller->renderPartial(
				'webroot.themes.' . Yii::app()->theme->name  . '.views.' . $this->getLcModel() . '.dialog.selectGrid',
				array('model'=>$this->gModel()),
				true
			);
	}

	/**
	 * Runs the widget.
	 */
	public function run() {
		$this->render('dialog');
	}

	public function gModel() {
		return call_user_func(array($this->model, 'model'));
	}

	/**
	 * Название модели (первая буква в нижнем регистре)
	 */
	public function getLcModel() {
		return lcfirst($this->model);
	}
	
	/**
	* Returns the URL to the published assets folder.
	* @return string the URL
	*/
	protected function getAssetsUrl() {
		if ($this->_assetsUrl !== null) {
			return $this->_assetsUrl;
		} else {
			$assetsPath = dirname(__FILE__) . '/assets';

			if (YII_DEBUG) {
				$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
			} else {
				$assetsUrl = Yii::app()->assetManager->publish($assetsPath);
			}
			return $this->_assetsUrl = $assetsUrl;
		}
	}

	/**
	 * Registers a JavaScript file in the assets folder.
	 * @param string $fileName the file name.
     * @param integer $position the position of the JavaScript file.
	 */
	protected function registerScriptFile($fileName, $position = CClientScript::POS_END) {
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl() . '/js/' . $fileName, $position);
	}

	protected function createController() {
		$controller = Yii::app()->createController($this->getLcModel());
		if ($controller == null || !is_array($controller) || !isset($controller[0])) {
			throw new Exception(Yii::t('app', 'Не удалось создать экземпляр контроллера {controller} ', array('controller'=>$this->model . 'Controller')));
		} else {
			$this->controller = $controller[0];
		}
	}
}

?>
