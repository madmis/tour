<?php $this->widget('bootstrap.widgets.BootNavbar', array(
	'fixed'=>true,
	'fluid'=>true,
	'brand'=>CHtml::encode(Yii::app()->name),
	'brandUrl'=>'#',
	'collapse'=>false, // requires bootstrap-responsive.css
	'items'=>array(
		array(
			'class'=>'bootstrap.widgets.BootMenu',
			'items'=>array(
				array('label'=>Yii::t('app', 'Главная'), 'url'=>'/', /*'active'=>true*/),
				array('label'=>Yii::t('app', 'Заявки'), 'url'=>'#', 'items'=>array(
					//array('label'=>'DROPDOWN HEADER', 'itemOptions'=>array('class'=>'nav-header')),
					array(
						'label'=>Yii::t('app', 'Текущие'),
						'url'=>'/request/admin',
						//'visible'=>true
					),
					array(
						'label'=>Yii::t('app', 'Архив'),
						'url'=>'/request/archived',
						//'visible'=>true
					),
				)),
				array('label'=>Yii::t('app', 'Справочники'), 'url'=>'#', 'items'=>array(
					array(
						'label'=>Yii::t('app', 'Клиенты'),
						'url'=>'/clients/admin',
						//'visible'=>Yii::app()->user->checkAccess('Clients.*')
					),
					array(
						'label'=>Yii::t('app', 'Валюты'),
						'url'=>'/currency/admin',
					),
					array(
						'label'=>Yii::t('app', 'Курсы валют'),
						'url'=>'/currencyRate/admin',
					),
				)),
				array('label'=>Yii::t('app', 'Администрирование'), 'url'=>'#',
					//'visible'=>Yii::app()->user->checkAccess(Rights::module()->superuserName),
					'items'=>array(
						array(
							'label'=>Yii::t('app', 'Пользователи'),
							'url'=>'/user/admin',
							//'visible'=>Yii::app()->user->checkAccess('User.*')
						),
						array(
							'label'=>Yii::t('app', 'Роли и права'),
							'url'=>'/rights',
							'visible'=>Yii::app()->user->checkAccess(Rights::module()->superuserName)
						),
						array(
							'label'=>Yii::t('app', 'Журнал действий пользователей'),
							'url'=>'/userActionLog/admin',
							'visible'=>Yii::app()->user->checkAccess(Rights::module()->superuserName)
						),
					)
				),
			),
		),
		//'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
		array(
			'class'=>'bootstrap.widgets.BootMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
			'items'=>array(
				array('label'=>Yii::app()->user->getName(), 'url'=>'#', 'items'=>array(
					array('label'=>Yii::t('app', 'Выход'), 'url'=>'/auth/logout'),
				)),
				array('label'=>'?', 'items'=>array(
					array(
						'label'=>'SD-Group',
						'url'=>'http://sd-group.org.ua/',
						'linkOptions'=>array('target'=>'_blank')
					),
					array(
						'label'=>Yii::t('app', 'Форум'),
						'url'=>'http://forum.sd-group.org.ua/', 
						'linkOptions'=>array('target'=>'_blank')
					),
					'---',
					array(
						'label'=>Yii::t('app', 'О программе'),
						'url'=>'/about/index',
						'visible' => Yii::app()->user->checkAccess('About.Index'),
					),
				)),
			),
		),
	),
)); ?>
