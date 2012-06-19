<?php
/**
 * DateHelper помощник работы с датами
 * @author dimon
 */
class DateHelper {
	/**
	 * Возвращает отформатированную с учетом локали дату
	 * @param mixed $timestamp UNIX timestamp or a string in strtotime format
	 * @param string $dateWidth width of the date pattern. It can be 'full', 'long', 'medium' and 'short'.
	 * default 'medium'
	 * @return string отформатированную с учетом локали дату. Если $date пустое или null, вернет null
	 */
	public static function getFormatedDate($date, $dateWidth='medium') {
		if (empty($date)) {
			return null;
		}
		return Yii::app()->getLocale(Yii::app()->language)->dateFormatter->formatDateTime($date, $dateWidth, null);
	}

	/**
	 * Возвращает отформатированную с учетом локали дату и время
	 * @param mixed $timestamp UNIX timestamp or a string in strtotime format
	 * @param string $dateWidth width of the date pattern. It can be 'full', 'long', 'medium' and 'short'.
	 * default 'medium'
	 * @param string $timeWidth width of the time pattern. It can be 'full', 'long', 'medium' and 'short'.
	 * default 'medium'
	 * @return string отформатированную с учетом локали дату и время. Если $date пустое или null, вернет null
	 */
	public static function getFormatedDateTime($date, $dateWidth='medium', $timeWidth='medium') {
		if (empty($date)) {
			return null;
		}
		return Yii::app()->getLocale(Yii::app()->language)->dateFormatter->formatDateTime($date, $dateWidth, $timeWidth);
	}

	/**
	 * Возвращает дату в указанном формате
	 * ф-я только для использования внутри хелпера
	 * @param string $date
	 * @param stirng $format. По умлочанию - 'Y-m-d'
	 * @return string or false
	 */
	protected static function format($date, $format='Y-m-d') {
		if ($date == null) {
			return null;
		}

		$t = new DateTime($date);
		return $t->format($format);
	}

	/**
	 * Преобразует дату в формат для записи в БД
	 * @param string $date
	 * @return string or false
	 */
	public static function dateToSql($date) {
		return self::format($date);
	}

	/**
	 * Преобразует дату в формат для записи в БД
	 * @param string $date
	 * @return string or false
	 */
	public static function dateTimeToSql($dateTime) {
		return self::format($dateTime, 'Y-m-d H:i:s');
	}
}