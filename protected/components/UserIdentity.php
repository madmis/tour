<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

	/**
	 * Id текущего пользователя
	 * @var int 
	 */
	private $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * Данный метод вызывается один раз при аутентификации пользователя.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		// Производим стандартную аутентификацию, описанную в руководстве.
		$user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
        if ($user === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else if (!$user->validatePassword($this->password)) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			// В качестве идентификатора будем использовать id, а не username,
			// как это определено по умолчанию. Обязательно нужно переопределить
			// метод getId(см. ниже).
			$this->_id = $user->id;

			// Далее логин нам не понадобится, зато имя может пригодится
			// в самом приложении. Используется как Yii::app()->user->name.
			// realName есть в нашей модели. У вас это может быть name, firstName
			// или что-либо ещё.
			$this->username = $user->username;

			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;

		/* $users=array(
		  // username => password
		  'demo'=>'demo',
		  'admin'=>'admin',
		  );
		  if(!isset($users[$this->username]))
		  $this->errorCode=self::ERROR_USERNAME_INVALID;
		  else if($users[$this->username]!==$this->password)
		  $this->errorCode=self::ERROR_PASSWORD_INVALID;
		  else
		  $this->errorCode=self::ERROR_NONE;
		  return !$this->errorCode; */
	}

    /**
	 * Получить id текущего пользователя
	 * @return Int 
	 */
	public function getId() {
		return $this->_id;
	}

}