<?php $this->widget('bootstrap.widgets.BootMenu', array(
	'type'=>'list',
	'items'=>array(
		array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
		array('label'=>Rights::t('core', 'Assignments'), 'icon'=>'random', 'url'=>array('/rights/assignment/view')),
		array('label'=>Rights::t('core', 'Permissions'), 'icon'=>'eye-open', 'url'=>array('/rights/authItem/permissions')),
		array('label'=>Rights::t('core', 'Roles'), 'icon'=>'user', 'url'=>array('/rights/authItem/roles')),
		array('label'=>Rights::t('core', 'Tasks'), 'icon'=>'check', 'url'=>array('/rights/authItem/tasks')),
		array('label'=>Rights::t('core', 'Operations'), 'icon'=>'retweet', 'url'=>array('/rights/authItem/operations')),
	)
)); ?>