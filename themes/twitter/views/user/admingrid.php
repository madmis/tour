<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>"userGrid",
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array('name'=>'id'),
		array('name'=>'username'),
		array('name'=>'password'),
		array('name'=>'email'),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px; white-space: nowrap;'),
			/*'template' => '{view} {view1} {update} {delete}',
			'buttons'  => array(
				'view1' => array(
					'label'=>'<i class="icon-eye-open"></i>',
					'url'=>'Yii::app()->createUrl("/user/$data->id")',
					'options'=>array('title'=>'title', 'class'=>'view1'),
				),
			),*/
		),
	),
)); ?>