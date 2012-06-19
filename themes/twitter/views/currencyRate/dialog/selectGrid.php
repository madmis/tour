<?php $this->widget('bootstrap.widgets.BootGridView', array(
	'id'=>'select-currencyRate-grid',
	'dataProvider'=>$model->search(),
	'template'=>"{items} {summary} {pager}",
	'itemsCssClass'=>'grid-view table table-striped table-bordered table-condensed',
	'filter' => $model,
	'ajaxUrl' => $this->createUrl('currencyRate/dialogSelect'),
	//'selectionChanged'=>'function(id){ console.log($.fn.yiiGridView.getSelection("select-clients-grid"));}',
	'selectableRows'=>1,
	'columns'=>array(
		array(
			'name'=>'id',
        ),
		array(
			'name'=>'currencyId',
			'value'=>'Currency::model()->findByPk($data->currencyId)->getAttribute("name");',
        ),
		array('name'=>'unit'),
		array(
			'name'=>'parentId',
			'value'=>'Currency::model()->findByPk($data->parentId)->getAttribute("name");',
        ),
		array('name'=>'rate'),
		array(
			'name'=>'date',
			'value'=>'DateHelper::getFormatedDate($data->date);',
        ),
	),
)); ?>