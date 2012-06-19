<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array('name'=>'id'),
		array('name'=>'fio'),
		array('name'=>'address'),
		array('name'=>'phone'),
		array('name'=>'email'),
		array('name'=>'comment'),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>