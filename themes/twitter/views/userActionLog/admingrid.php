<?php
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('audit-trail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
 * 
 */
?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>"audit-trail-grid",
	'dataProvider'=>$model->search(array('pagination'=>array('pageSize' => 100))),
	'template'=>"{pager} <p>{summary}</p> {items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array('style'=>'width:5%;'),
		),
		array(
			'name'=>'record_id',
			'htmlOptions'=>array('style'=>'width:5%;'),
			),
		array('name'=>'old_value'),
		array('name'=>'new_value'),
		array(
			'name'=>'action',
			'htmlOptions'=>array('style'=>'width:5%;'),
			),
		array(
			'name'=>'model',
			'htmlOptions'=>array('style'=>'width:5%;'),
			),
		array(
			'name'=>'field',
			'htmlOptions'=>array('style'=>'width:10%;'),
			),
		array(
			'name'=>'date',
			'value'=>'DateHelper::getFormatedDateTime($data->date);'),
		array(
			'name'=>'user_id',
			'value'=>'User::model()->findByPk($data->user_id)->username;',
			),

		/*array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px; white-space: nowrap;'),
			'template' => '{view} {view1} {update} {delete}',
			'buttons'  => array(
				'view1' => array(
					'label'=>'<i class="icon-eye-open"></i>',
					'url'=>'Yii::app()->createUrl("/user/$data->id")',
					'options'=>array('title'=>'title', 'class'=>'view1'),
				),
			),
		),*/
	),
)); ?>