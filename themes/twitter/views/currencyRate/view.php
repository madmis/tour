<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Курсы валют')=>array('admin'),
	$model->id,
);
?>

<h3><?php echo Yii::t('app', 'Курсы валют'); ?> #<?php echo $model->id; ?></h3>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		/*array(
			'name'=>'parentId',
			'value'=>Currency::model()->findByPk($model->parentId)->getAttribute('name'),
		),*/
		'rate',
		array(
			'name'=>'currencyId',
			'value'=>Currency::model()->findByPk($model->currencyId)->getAttribute('name'),
		),
		'unit',
		array(
			'name'=>'date',
			'value'=>DateHelper::getFormatedDate($model->date)
		),
	),
)); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>