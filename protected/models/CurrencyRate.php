<?php

/**
 * This is the model class for table "currency_rate".
 *
 * The followings are the available columns in table 'currency_rate':
 * @property string $id
 * @property string $rate
 * @property integer $currencyId
 * @property string $unit
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Currency $currency
 * @property Currency $parent
 */
class CurrencyRate extends BaseModel {

	public $currency_name = null;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurrencyRate the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'currency_rate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rate, currencyId, unit, date, currency_name', 'required'),
			//array('parentId, currencyId', 'numerical', 'integerOnly' => true),
			array('currencyId', 'numerical', 'integerOnly' => true),
			array('rate, unit', 'length', 'max' => 10),
			//array('currencyId', 'compare', 'compareAttribute'=>'parentId', 'operator'=>'!=', 'allowEmpty'=>false, 'message'=>'В качестве валюты не может быть указана базовая валюта.'),
			//курс должен быть уникальным на одну дату
			array('date', 'uniqueRate'),
			//выбранная валюта не базовая
			array('currencyId', 'notBase'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rate, currencyId, unit, date', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'currency' => array(self::BELONGS_TO, 'Currency', 'currencyId'),
			/*'parent' => array(self::BELONGS_TO, 'Currency', 'parentId'),*/
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'id' => 'ID',
			/*'parentId' => 'Базовая валюта',*/
			'rate' => 'Курс',
			'currencyId' => 'Валюта',
			'currency_name' => 'Валюта',
			'unit' => 'Единиц валюты',
			'date' => 'Дата курса',
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

		$criteria->compare('id', $this->id, true);
		/*$criteria->compare(
				'parentId', 
				$this->parentId == null ? null : Currency::model()->find('name=:name', array(':name'=>$this->parentId))->id
			);*/
		$criteria->compare('rate', $this->rate, true);
		$criteria->compare(
				'currencyId',
				$this->currencyId == null ? null : Currency::model()->find('name=:name', array(':name'=>$this->currencyId))->id
			);
		$criteria->compare('unit', $this->unit, true);
		$criteria->compare('date', DateHelper::dateToSql($this->date), true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

	protected function beforeSave() {
		$this->date = DateHelper::dateToSql($this->date);
		return parent::beforeSave();
	}

	/**
	 * Валидатор уникальности курса на дату 
	 */
	public function uniqueRate() {
		if (!$this->hasErrors()) {
			$criteria = new CDbCriteria();
			$criteria->addCondition(array(
				'date=:date',
				'currencyId=:currencyId',
			));
			$criteria->params = array(
				':date'=>DateHelper::dateToSql($this->date),
				':currencyId'=>$this->currencyId
			);

			if ($this->model()->find($criteria) != null) {
				$this->addError('date', Yii::t('app', 'Курс на текущую дату уже установлен.'));
			}
		}
	}

	/**
	 * Валидатор, что выбрана не базовая валюта
	 */
	public function notBase() {
		if (Currency::model()->getBaseCurrency()->id == $this->currencyId) {
			$this->addError('currencyId', Yii::t('app', 'Выбранная валюта не должна быть базовой.'));
		}
	}

}
