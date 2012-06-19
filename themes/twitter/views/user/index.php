<?php
$this->breadcrumbs = array(Yii::t('app', 'Пользователи'));
?>

<h3><?php echo Yii::t('app', 'Пользователи'); ?></h3>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
<?php $this->renderPartial('menu', array('model'=>$model)); ?>
