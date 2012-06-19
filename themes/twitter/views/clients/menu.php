<?php
$this->menu=array(
	array('label'=>Yii::t('app', 'ОПЕРАЦИИ'), 'itemOptions'=>array('class'=>'nav-header')),
	array('label'=>Yii::t('app', 'Управление клиентами'), 'icon'=>'user', 'url'=>array('clients/admin')),
	array('label'=>Yii::t('app', 'Добавить клиента'), 'icon'=>'plus', 'url'=>array('clients/create')),
	//array('label'=>'List Clients', 'url'=>array('clients/index')),
	//array('label'=>'Update Clients', 'url'=>array('clients/update', 'id'=>$model->id)),
	//array('label'=>'Delete Clients', 'url'=>'#', 
	//'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>