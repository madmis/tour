<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'filter' => $model,
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array(
				'style'=>'width:5%;',
			),
		),
		/*array(
			'name'=>'parentId',
			'value'=>'Currency::model()->findByPk($data->parentId)->getAttribute("name");',
        ),*/
		array('name'=>'rate'),
		array(
			'name'=>'currencyId',
			'value'=>'Currency::model()->findByPk($data->currencyId)->getAttribute("name");',
        ),
		array('name'=>'unit'),
		array(
			'name'=>'date',
			'value'=>'DateHelper::getFormatedDate($data->date);',
        ),
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>