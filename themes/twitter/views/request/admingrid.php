<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>"requestGrid",
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
//		array(
//			'name'=>'id',
//			'htmlOptions'=>array(
//				'style'=>'width:5%;',
//			),
//		),
		array(
			'name'=>'number',
			'htmlOptions'=>array(
				'style'=>'width:5%;',
			),
		),
		array(
			'name'=>'date',
			'value'=>'DateHelper::getFormatedDate($data->date);',
			'htmlOptions'=>array(
				'style'=>'width:10%;',
			),
        ),
		//'buyer',
		'buyer_name',
		array(
			'name'=>'base_cost',
			'htmlOptions'=>array(
				'style'=>'width:10%;',
			),
		),
		array(
			'name'=>'currency_name',
		),
		/*
		'discount',
		'comment',
		'org',*/
		//'officer',
		array(
			'name'=>'officer_name',
			'htmlOptions'=>array(
				'style'=>'width:15%;',
			),
		),
		'program',
		/*'blocked',
		'archived',
		'pay_status',
		'pay_date',
		'non_cash',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>