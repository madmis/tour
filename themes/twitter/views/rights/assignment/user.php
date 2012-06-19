<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments')=>array('assignment/view'),
	$model->getName(),
); ?>

<div id="userAssignments">

	<h3><?php echo Rights::t('core', 'Assignments for :username', array(':username'=>$model->getName())); ?></h3>

	<div class="assignments span-12 first" style="margin-top: 20px;">
		<?php $this->widget('bootstrap.widgets.BootGridView', array(
			'dataProvider'=>$dataProvider,
			'template'=>"{items}",
			'hideHeader'=>true,
			'emptyText'=>Rights::t('core', 'This user has not been assigned any items.'),
			'itemsCssClass'=>'table table-striped table-bordered table-condensed',
			'columns'=>array(
    			array(
    				'name'=>'name',
    				'header'=>Rights::t('core', 'Name'),
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'name-column'),
    				'value'=>'$data->getNameText()',
    			),
    			array(
    				'name'=>'type',
    				'header'=>Rights::t('core', 'Type'),
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'type-column'),
    				'value'=>'$data->getTypeText()',
    			),
    			array(
    				'header'=>'&nbsp;',
    				'type'=>'raw',
    				'htmlOptions'=>array('class'=>'actions-column'),
    				'value'=>'$data->getRevokeAssignmentLink()',
    			),
			)
		)); ?>

	</div>

	<div class="add-assignment span-11 last">

		<?php if( $formModel!==null ): ?>
				<?php $this->renderPartial('_form', array(
					'model'=>$formModel,
					'itemnameSelectOptions'=>$assignSelectOptions,
				)); ?>
		<?php else: ?>
			<p class="info"><?php echo Rights::t('core', 'No assignments available to be assigned to this user.'); ?>
		<?php endif; ?>

	</div>

</div>