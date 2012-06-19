<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends BaseModel {

	/**
	 * @var string 
	 */
	private $_npassword = null;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'length', 'max' => 128),
			array('username, email', 'filter', 'filter'=>'trim'),
			array('password', 'filter', 'filter'=>'trim', 'on'=>'create'),
			array('username', 'required'),
			array('username', 'unique'),
			array('password', 'required', 'on'=>'create'),
			array('npassword', 'safe', 'on'=>'update'),
			array('npassword', 'filter', 'filter'=>'trim', 'on'=>'update'),
			array('npassword', 'required', 'on'=>'update'),
			array('email', 'default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Имя пользователя'),
			'password' => Yii::t('app', 'Пароль'),
			'npassword' => Yii::t('app', 'Пароль'),
			'email' => Yii::t('app', 'Email'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
					'pagination' => array(
						'pageSize' => 30, // количество записей на странице
					),
				));
	}

	public function validatePassword($password) {
		return $this->hashPassword($password) === $this->password;
	}

	public function hashPassword($password) {
		$password = trim($password);
		return !empty($password) ? md5($password) : null;
	}

	protected function beforeSave() {
		$this->password = $this->hashPassword($this->password);
		return parent::beforeSave();
	}

    protected function beforeValidate() {
		return parent::beforeValidate();
	}

	public function getNpassword() {
		return $this->_npassword;
	}

	public function setNpassword($password) {
		$this->_npassword = $password;
		if (!empty($this->_npassword)) {
			$this->password = $this->_npassword;
		}
	}
}