<?php

/**
 * Класс базовой модели для всех моделей требующих AR
 * @author Dimon
 */
class BaseModel extends CActiveRecord {

	/**
	 * Подключаем класс поведения для логирования действий пользователей.
	 */
	public function behaviors() {
		return array(
			'LoggableBehavior' =>
				'application.modules.auditTrail.behaviors.LoggableBehavior',
		);
	}

}

?>
