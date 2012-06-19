<?php

class LoggableBehavior extends CActiveRecordBehavior {

	private $_oldattributes = array();

	public function afterSave($event) {
		//If we have no user object, this must be a command line program
		$user = $this->checkUser();

		$newattributes = $this->Owner->getAttributes();
		$oldattributes = $this->getOldAttributes();

		// по идее, $oldattributes всегда содержит полный список полей,
		// т.к., это список полей полученных из БД.
		// $newattributes может содержать не полный список, например,
		// если какое-то значение из формы было передано пустым
		// для этого нужно найти такие поля и записать их в логи пустыми
		// это на будущее, для доработки.

		// почему-то сейчас сделано все наоборот. Если все как я думаю,
		// то пробегаться в цикле нужно не по $newattributes, а по $oldattributes
		// а потом уже проверять, каких полей не хватает.
		// Но возможно я просто чего-то не знаю. Поэтому пока ничего менять не буду.

		// еще один момент. Что будет, если будте происходить множественное обновление
		// к примеру UPDATE user SET password='1'. Обновятся все пользователи, но что будет
		// в логах. Нужно будет попробовать.

		if (!$this->Owner->isNewRecord) {
			// compare old and new
			foreach ($newattributes as $name => $value) {
				$old = !empty($oldattributes) ? $oldattributes[$name] : null;

				if ($value != $old) {
					$log = new AuditTrail();
					$log->old_value = $old;
					$log->new_value = $value;
					$log->action = 'UPDATE';
					$log->model = get_class($this->Owner);
					$log->record_id = $this->Owner->getPrimaryKey();
					$log->field = $name;
					$log->date = date('Y-m-d H:i:s');
					$log->user_id = $user['id'];
					$log->save();
				}
			}
		} else {
			$log = new AuditTrail();
			$log->old_value = null;
			$log->new_value = null;
			$log->action = 'INSERT';
			$log->model = get_class($this->Owner);
			$log->record_id = $this->Owner->getPrimaryKey();
			$log->field = null;
			$log->date = date('Y-m-d H:i:s');
			$log->user_id = $user['id'];
			$log->save();

			foreach ($newattributes as $name => $value) {
				$log = new AuditTrail();
				$log->old_value = null;
				$log->new_value = $value;
				$log->action = 'SET';
				$log->model = get_class($this->Owner);
				$log->record_id = $this->Owner->getPrimaryKey();
				$log->field = $name;
				$log->date = date('Y-m-d H:i:s');
				$log->user_id = $user['id'];
				$log->save();
			}
		}
		return parent::afterSave($event);
	}

	public function afterDelete($event) {
		$user = $this->checkUser();

		$log = new AuditTrail();
		$log->old_value = null;
		$log->new_value = null;
		$log->action = 'DELETE';
		$log->model = get_class($this->Owner);
		$log->record_id = $this->Owner->getPrimaryKey();
		$log->field = null;
		$log->date = date('Y-m-d H:i:s');
		$log->user_id = $user['id'];
		$log->save();
		return parent::afterDelete($event);
	}

	private function checkUser() {
		$result = array(
			'name'=>NO_USER,
			'id'=>0,
		);
		try {
			$result['name'] = Yii::app()->user->Name;
			$result['id'] = Yii::app()->user->id;
		} catch (Exception $e) {}
		
		return $result;
	}

	public function afterFind($event) {
		// Save old values
		$this->setOldAttributes($this->Owner->getAttributes());

		return parent::afterFind($event);
	}

	public function getOldAttributes() {
		return $this->_oldattributes;
	}

	public function setOldAttributes($value) {
		$this->_oldattributes = $value;
	}

}

?>