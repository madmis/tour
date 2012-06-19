<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
	array('label'=>Yii::t('app', 'Управление пользователями'), 'icon'=>'user', 'url'=>array('user/admin')),
	array('label'=>Yii::t('app', 'Добавить пользователя'), 'icon'=>'plus', 'url'=>array('user/create')),
	//array('label'=>Yii::t('app', 'Список пользователей'), 'url'=>array('index')),
	//array('label'=>Yii::t('app', 'Просмотр пользователя'), 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>Yii::t('app', 'Изменение пользователя'), 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app', 'Удалить пользователя'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить пользователя?')),
	//array('label'=>'Export to Excel', 'url'=>array('excel', 'model'=>'User',)),
);

?>