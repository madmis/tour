<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Заявки')=>array('admin'),
	Yii::t('app', 'Управление текущими заявками'),
);

/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('request-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
  */
?>

<h3><?php echo Yii::t('app', 'Управление текущими заявками'); ?></h3>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">-->
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div> search-form -->

<?php $this->renderPartial('admingrid', array('model'=>$model)); ?>
<?php $this->renderPartial('menu', array('model'=>$model)); ?>
