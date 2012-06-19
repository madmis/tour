<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Тур-Агентство',
	'sourceLanguage' => 'en_US',
	'language' => 'ru',
	'charset'=>'utf-8',
	// preloading 'log' component
	'preload' => array('log', 'bootstrap',),
	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.helpers.*',
		'application.modules.auditTrail.models.AuditTrail',
	),
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '1',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
			'generatorPaths' => array(
				'bootstrap.gii', // since 0.9.1
			),
		),
		'rights' => array(
			//'layout' => 'rights.views.layouts.main', // Layout to use for displaying Rights.
			'layout' => 'webroot.themes.twitter.views.rights.layouts.main',
			'appLayout' => 'webroot.themes.twitter.views.layouts.main',
			//'appLayout' => 'webroot.themes.sd-theme.views.layouts.main'
			'superuserName'=>'SuperAdmin',
		),
		'auditTrail'=>array(
			'userClass' => 'User', // the class name for the user object
			'userIdColumn' => 'id', // the column name of the primary key for the user
			'userNameColumn' => 'username', // the column name of the primary key for the user
		),
	),
	// application components
	'components' => array(
		'user' => array(
			//'class' => 'WebUser',
			'class' => 'RWebUser',
			// enable cookie-based authentication
			'allowAutoLogin' => true,
			'loginUrl' => array('auth/login'),
		),
		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),
		/*
		  'db'=>array(
		  'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		  ),
		 */
		// uncomment the following to use a MySQL database
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=tour',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			//'tablePrefix'=>'tbl_',
			// включаем профайлер
			'enableProfiling' => true,
			// показываем значения параметров
			'enableParamLogging' => true,
			'schemaCachingDuration' => 3600,
		),
		'authManager' => array(
			//'class' => 'DbAuthManager',
			'class' => 'RDbAuthManager',
			'connectionID' => 'db',
			'showErrors' => YII_DEBUG,
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
		),
		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error',
		),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
					'enabled' => false,
					// логируем sql запросы в файл
					// 'levels' => 'trace',
					//'categories'=>'system.db.CDbCommand',
					//'LogFile' => 'db.trace',
				),
				array(
					// направляем результаты профайлинга в ProfileLogRoute (отображается
					// внизу страницы)
					'class' => 'CProfileLogRoute',
					'levels' => 'profile',
					'enabled' => false,
				),
				// uncomment the following to show log messages on web pages
				array(
					'class' => 'CWebLogRoute',
					/*'categories' => 'application',*/
					'levels' => 'error, warning, trace, profile, info',
					'showInFireBug' => false,
					'enabled' => false,
				),
				array(
					'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters' => array('127.0.0.1', '192.168.1.215'),
					'enabled' => false,
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
	//'theme' => 'sd-theme',
	'theme' => 'twitter',
);