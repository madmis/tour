<?php $this->breadcrumbs=array(Yii::t('app', 'Курсы валют')); ?>

<h3><?php echo Yii::t('app', 'Курсы валют'); ?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
