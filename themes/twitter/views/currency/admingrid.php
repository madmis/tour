<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array('name'=>'id'),
		array('name'=>'name'),
		array('name'=>'ISOChar'),
		array('name'=>'ISONum'),
		array('name'=>'base'),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>