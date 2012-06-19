<?php
$this->menu=array(
	array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
	array('label'=>Yii::t('app', 'Управление курсами валют'), 'icon'=>'user', 'url'=>array('currencyRate/admin')),
	array('label'=>Yii::t('app', 'Добавить курс валюты'), 'icon'=>'plus', 'url'=>array('currencyRate/create')),
	//array('label'=>'List CurrencyRate', 'url'=>array('index')),
	//array('label'=>'Create CurrencyRate', 'url'=>array('create')),
	//array('label'=>'Update CurrencyRate', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete CurrencyRate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage CurrencyRate', 'url'=>array('admin')),
);
?>