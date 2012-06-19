<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'select-user-grid',
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'grid-view table table-striped table-bordered table-condensed',
	'filter' => $model,
	'ajaxUrl' => $this->createUrl('user/dialogSelect'),
	'selectableRows'=>1,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array(
				'style'=>'width:5%;',
			),
		),
		'username',
		'email',
	),
)); ?>