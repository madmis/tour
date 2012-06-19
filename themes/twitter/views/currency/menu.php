<?php
$this->menu=array(
	array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
	array('label'=>Yii::t('app', 'Управление валютами'), 'icon'=>'user', 'url'=>array('currency/admin')),
	array('label'=>Yii::t('app', 'Добавить валюту'), 'icon'=>'plus', 'url'=>array('currency/create')),
	//array('label'=>'List Currency', 'url'=>array('index')),
	//array('label'=>'Create Currency', 'url'=>array('create')),
	//array('label'=>'Update Currency', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Currency', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>