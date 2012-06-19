<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
	array('label'=>Yii::t('app', 'Текущие заявки'), 'icon'=>'file', 'url'=>array('request/admin')),
	array('label'=>Yii::t('app', 'Архивные заявки'), 'icon'=>'file', 'url'=>array('request/archived')),
	array('label'=>Yii::t('app', 'Добавить заявку'), 'icon'=>'plus', 'url'=>array('request/create')),
	//array('label'=>Yii::t('app', 'Список заявок'), 'url'=>array('request/index')),
	//array('label'=>Yii::t('app', 'Просмотр заявки'), 'url'=>array('request/view', 'id'=>$model->id)),
	//array('label'=>Yii::t('app', 'Изменение заявки'), 'url'=>array('request/update', 'id'=>$model->id)),
	//array('label'=>Yii::t('app', 'Удалить заявку'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить пользователя?')),
);

?>