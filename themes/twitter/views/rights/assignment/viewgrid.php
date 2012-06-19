<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array(
			'name'=>'username',
			//'header'=>Rights::t('core', 'Name'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'name-column', 'width'=>'20%'),
			'value'=>'$data->getAssignmentNameLink()',
		),
		array(
			'name'=>'assignments',
			'header'=>Rights::t('core', 'Roles'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'role-column'),
			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_ROLE)',
			'filter'=>false,
		),
		array(
			'name'=>'assignments',
			'header'=>Rights::t('core', 'Tasks'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'task-column'),
			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_TASK)',
			'filter'=>false,
		),
		array(
			'name'=>'assignments',
			'header'=>Rights::t('core', 'Operations'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'operation-column'),
			'value'=>'$data->getAssignmentsText(CAuthItem::TYPE_OPERATION)',
			'filter'=>false,
		),
//		array(
//			'class'=>'bootstrap.widgets.BootButtonColumn',
//			'htmlOptions'=>array('style'=>'width: 50px; white-space: nowrap;'),
//		),
	),
)); ?>