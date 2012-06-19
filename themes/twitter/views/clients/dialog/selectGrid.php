<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'select-clients-grid',
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'grid-view table table-striped table-bordered table-condensed',
	'filter' => $model,
	'ajaxUrl' => $this->createUrl('clients/dialogSelect'),
	//'selectionChanged'=>'function(id){ console.log($.fn.yiiGridView.getSelection("select-clients-grid"));}',
	'selectableRows'=>1,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array(
				'style'=>'width:5%;',
			),
		),
		array('name'=>'fio'),
//		array('name'=>'address'),
		array('name'=>'phone'),
		array('name'=>'email'),
//		array('name'=>'comment'),
		/*array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),*/
	),
)); ?>