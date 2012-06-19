<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'select-currency-grid',
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'grid-view table table-striped table-bordered table-condensed',
	'filter' => $model,
	'ajaxUrl' => $this->createUrl('currency/dialogSelect'),
	//'selectionChanged'=>'function(id){ console.log($.fn.yiiGridView.getSelection("select-clients-grid"));}',
	'selectableRows'=>1,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array(
				'style'=>'width:5%;',
			),
		),
		array('name'=>'name'),
		array('name'=>'ISOChar'),
		array('name'=>'ISONum'),
		array('name'=>'base'),
	),
)); ?>