<?php

// если работаем локально, включаем отладку и подключаем development конфигурацию
// иначе, выключаем отладку и включаем production конфигурацию
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' &&
		@file_exists(dirname(__FILE__) . '/protected/config/development.php')) {
	define('YII_DEBUG', true);
	define('YII_ENABLE_EXCEPTION_HANDLER', true);
	define('YII_ENABLE_ERROR_HANDLER', true);
	define('YII_TRACE_LEVEL', 3);
	$config = dirname(__FILE__) . '/protected/config/development.php';
	require(dirname(__FILE__) . '/../../home/yii/YiiBase.php');
	class Yii extends YiiBase {
		/**
		 * @static
		 * @return CWebApplication
		 */
		public static function app() { return parent::app(); }
	}
} else {
	define('YII_DEBUG', false);
	define('YII_ENABLE_EXCEPTION_HANDLER', true);
	define('YII_ENABLE_ERROR_HANDLER', true);
	define('YII_TRACE_LEVEL', 0);
	$config = dirname(__FILE__) . '/protected/config/production.php';
	require(dirname(__FILE__) . '/../yii/yii.php');
}

Yii::createWebApplication($config)->run();