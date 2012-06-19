<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'dataProvider'=>$dataProvider,
    'template'=>'{items}',
    'emptyText'=>Rights::t('core', 'No operations found.'),
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	//'filter' => $model,
	'columns'=>array(
		array(
			'name'=>'name',
			'header'=>Rights::t('core', 'Name'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'name-column'),
			'value'=>'$data->getGridNameLink()',
		),
		array(
			'name'=>'description',
			'header'=>Rights::t('core', 'Description'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'description-column'),
		),
		array(
			'name'=>'bizRule',
			'header'=>Rights::t('core', 'Business rule'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'bizrule-column'),
			'visible'=>Rights::module()->enableBizRule===true,
		),
		array(
			'name'=>'data',
			'header'=>Rights::t('core', 'Data'),
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'data-column'),
			'visible'=>Rights::module()->enableBizRuleData===true,
		),
		array(
			'header'=>'&nbsp;',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'actions-column'),
			'value'=>'$data->getDeleteOperationLink()',
		),
	)
)); ?>
