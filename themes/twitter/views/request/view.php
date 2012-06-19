<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Заявки')=>array('admin'),
	$model->id,
);
?>

<h3><?php echo Yii::t('app', 'Просмотр заявки'); ?> #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'number',
		array(
			'name'=>'date',
			'value'=>DateHelper::getFormatedDate($model->date)
		),
		'buyer',
		'buyer_name',
		'base_cost',
		'currency_rate',
		'discount',
		'comment',
		'org',
		'officer_name',
		'program',
		array(
			'name'=>'blocked',
			'value'=>$model->blocked ? 'Да' : 'Нет'
		),
		array(
			'name'=>'archived',
			'value'=>$model->archived ? 'Да' : 'Нет'
		),
		array(
			'name'=>'pay_status',
			'value'=>$model->pay_status ? 'Оплачена' : 'Не оплачена'
		),
		array(
			'name'=>'pay_date',
			'value'=>DateHelper::getFormatedDate($model->pay_date)
		),
		array(
			'name'=>'non_cash',
			'value'=>$model->non_cash ? 'Да' : 'Нет'
		),
	),
)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>