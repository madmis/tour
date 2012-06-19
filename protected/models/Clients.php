<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id
 * @property string $fio
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $comment
 */
class Clients extends BaseModel {

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clients the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly' => true),
			array('fio, address, phone, email, comment', 'filter', 'filter' => 'trim'),
			array('fio, address', 'required'),
			array('fio', 'unique'),
			array('phone, email, comment', 'default', 'setOnEmpty' => true, 'value' => null),
			array('phone', 'length', 'max' => 25),
			array('email', 'length', 'max' => 150),
			array('fio, address, comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fio, address, phone, email, comment', 'safe', 'on' => 'search'),
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
			'id' => 'ID',
			'fio' => 'ФИО',
			'address' => 'Адрес',
			'phone' => 'Телефон',
			'email' => 'Email',
			'comment' => 'Комментарий',
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
		$criteria->compare('fio', $this->fio, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('comment', $this->comment, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
					'pagination' => array(
						'pageSize' => 50,
					),
				));
	}

}