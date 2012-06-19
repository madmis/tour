<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Тур-Агентство',
	'sourceLanguage' => 'en_US',
	'language' => 'ru',
	'charset'=>'utf-8',
	'preload' => array('log', 'bootstrap',),
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.helpers.*',
		'application.modules.auditTrail.models.AuditTrail',
	),
	'modules' => array(
		'rights' => array(
			'layout' => 'webroot.themes.twitter.views.rights.layouts.main',
			'appLayout' => 'webroot.themes.twitter.views.layouts.main',
			'superuserName'=>'SuperAdmin',
		),
		'auditTrail'=>array(
			'userClass' => 'User', // the class name for the user object
			'userIdColumn' => 'id', // the column name of the primary key for the user
			'userNameColumn' => 'username', // the column name of the primary key for the user
		),
	),
	'components' => array(
		'user' => array(
			'class' => 'RWebUser',
			'allowAutoLogin' => true,
			'loginUrl' => array('auth/login'),
		),
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=webapp',
			'username' => 'webapp',
			'password' => '27011982',
			'charset' => 'utf8',
			//'tablePrefix'=>'tbl_',
			// включаем профайлер
			'emulatePrepare' => true,
			'enableProfiling' => false,
			// показываем значения параметров
			'enableParamLogging' => false,
			'schemaCachingDuration' => 3600,
		),
		'authManager' => array(
			'class' => 'RDbAuthManager',
			'connectionID' => 'db',
			'showErrors' => YII_DEBUG,
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
		),
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					//'levels' => 'trace, info',
					'levels'=>'error, warning',
					//'categories' => 'system.*',
				),
			),
		),
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
			'coreCss'=>true, // whether to register the Bootstrap core CSS (bootstrap.min.css), defaults to true
			'responsiveCss'=>false, // whether to register the Bootstrap responsive CSS (bootstrap-responsive.min.css), default to false
			'plugins'=>array(
				// Optionally you can configure the "global" plugins (button, popover, tooltip and transition)
				// To prevent a plugin from being loaded set it to false as demonstrated below
				'transition'=>false, // disable CSS transitions
				'tooltip'=>array(
					'selector'=>'[rel=tooltip]', // bind the plugin tooltip to anchor tags with the 'tooltip' class
					'options'=>array(
						'placement'=>'bottom', // place the tooltips below instead
					),
				),
			),
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
	'theme' => 'twitter',
);