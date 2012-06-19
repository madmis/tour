<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id
 * @property integer $number
 * @property date $date
 * @property integer $buyer
 * @property decimal $base_cost
 * @property integer $currency_rate
 * @property decimal $discount
 * @property string $comment
 * @property string $org
 * @property integer $officer
 * @property string $program
 * @property integer $blocked
 * @property integer $archived
 * @property integer $pay_status
 * @property date $pay_date
 * @property integer $non_cash
 *
 * The followings are the available model relations:
 * @property User $officer0
 * @property Clients $buyer0
 * @property CurrencyRate $currency_rate0
 */
class Request extends BaseModel {
	
	public $currency_name = null;

	//protected $buyer_name = '';
	//protected $officer_name = null;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Request the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number', 'required'),
			array('number', 'numerical', 'integerOnly' => true, 'allowEmpty' => false, 'min' => 1),
			array('date', 'required'),
			array('date', 'date', 'format' => 'd.M.yyyy'),
			array('buyer_name', 'required'),
			array('buyer', 'required'),
			array('buyer', 'numerical', 'integerOnly' => true, 'allowEmpty' => false, 'min' => 1),
			array('buyer', 'exist', 'allowEmpty' => false,
				'attributeName' => 'id', 'className' => 'Clients',
				'message' => 'Покупателя с идентификатором {value} не существует!',
			),
			array('base_cost', 'required'),
			array('base_cost', 'length', 'max' => 9),
			array('base_cost', 'match', 'pattern' => '/(\d+)(((,)\d+)+)?/'),
			//array('base_cost', 'match', 'pattern' => '/(\d+)(((,)\d+)+)?/'),
			array('base_cost', 'match',
				'pattern' => '/^(([^0]{1})([0-9])*|(0{1}))(\.\d{2})?$/',
				'message' => 'Поле {attribute} заполнено неверно!',
			),
			//array('currency', 'length', 'max' => 3),
			//array('currency', 'in', 'range' => array('UAH', 'EUR', 'USD')),
			array('currency_rate', 'numerical', 'integerOnly' => true, 'allowEmpty' => true, 'min' => 1),
			array('currency_rate', 'exist',
				'attributeName' => 'id', 'className' => 'CurrencyRate',
				'message' => 'Выбранного курса валюты не существует!',
			),
			array('discount', 'length', 'max' => 5),
			array('discount', 'match', 'pattern' => '/(\d+)(((,)\d+)+)?/'),
			array('org', 'required'),
			array('org', 'length', 'max' => 255),
			array('officer_name', 'required'),
			array('officer', 'required'),
			array('officer', 'numerical', 'integerOnly' => true, 'allowEmpty' => false, 'min' => 1),
			array('officer', 'exist', 'allowEmpty' => false,
				'attributeName' => 'id', 'className' => 'User',
				'message' => 'Покупателя с идентификатором {value} не существует!',
			),
			array('pay_date', 'date', 'format' => 'd.M.yyyy'),
			array('blocked', 'in', 'range' => array(0, 1)),
			array('archived', 'in', 'range' => array(0, 1)),
			array('non_cash', 'in', 'range' => array(0, 1)),
			array('pay_status', 'in', 'range' => array(0, 1)),
			array('comment, program, pay_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, date, buyer, base_cost, currency_rate, discount, comment, org, officer, program, blocked, archived, pay_status, pay_date, non_cash', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'officer0' => array(self::BELONGS_TO, 'User', 'officer'),
			'buyer0' => array(self::BELONGS_TO, 'Clients', 'buyer'),
			'currency_rate0' => array(self::BELONGS_TO, 'CurrencyRate', 'currency_rate'),
			'currency_cid' => array(self::HAS_ONE, 'Currency', array('currencyId'=>'id'), 'through'=>'currency_rate0'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'number' => 'Номер заявки',
			'date' => 'Дата заявки',
			'buyer' => 'Покупатель',
			'buyer_name' => 'Покупатель',
			'base_cost' => 'Базовая стоимость',
			'currency_rate' => 'Идентификатор курса',
			'currency_name' => 'Курс валюты',
			'discount' => 'Скидка, %',
			'comment' => 'Комментарий',
			'org' => 'Организация',
			'officer' => 'Ответственный',
			'officer_name' => 'Ответственный',
			'program' => 'Программа',
			'blocked' => 'Заблокирована',
			'archived' => 'Архивная',
			'pay_status' => 'Состояние оплаты',
			'pay_date' => 'Дата предполагаемой оплаты',
			'non_cash' => 'Безналичный расчет',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($options = array()) {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('number', $this->number, true);
		$criteria->compare('date', $this->date, true);
		$criteria->compare('buyer', $this->buyer);
		$criteria->compare('buyer_name', $this->buyer_name, true);
		$criteria->compare('base_cost', $this->base_cost, true);
		$criteria->compare('currency_rate', $this->currency_rate, true);
		$criteria->compare('discount', $this->discount, true);
		$criteria->compare('comment', $this->comment, true);
		$criteria->compare('org', $this->org, true);
		$criteria->compare('officer', $this->officer);
		$criteria->compare('officer_name', $this->officer_name, true);
		$criteria->compare('program', $this->program, true);
		$criteria->compare('blocked', $this->blocked);
		$criteria->compare('archived', $this->archived);
		$criteria->compare('pay_status', $this->pay_status);
		$criteria->compare('pay_date', $this->pay_date, true);
		$criteria->compare('non_cash', $this->non_cash);

		isset($options['sort']) ? null : $options['sort'] = array('defaultOrder' => 'date ASC');
		isset($options['pagination']) ? null : $options['pagination'] = array('pageSize' => 30);

		return new CActiveDataProvider(
				$this,
				array_merge(array('criteria' => $criteria,), $options)
			);
	}

	/* public function getBuyer_name() {
	  return $this->buyer_name;
	  } */

	/* public function getOfficer_name() {
	  return $this->officer_name;
	  } */

	protected function beforeSave() {
		$this->date = DateHelper::dateToSql($this->date);

		if (!empty($this->pay_date)) {
			$this->pay_date = DateHelper::dateToSql($this->pay_date);
		} else {
			$this->pay_date = null;
		}

		// если у пользователя нет прав на выбор пользователя
		// сохраняем всегда его данные
		if (!Yii::app()->user->checkAccess('User.DialogSelect')) {
			//if (!Rights::getAuthorizer()->isSuperuser(Yii::app()->user->getId())) {
			$model->officer = Yii::app()->user->getId();
			$model->officer_name = Yii::app()->user->getName();
		}

		return parent::beforeSave();
	}

}