<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Tasks'),
); ?>

<div id="tasks">

	<h3><?php echo Rights::t('core', 'Tasks'); ?></h3>

	<p>
		<?php echo Rights::t('core', 'A task is a permission to perform multiple operations, for example accessing a group of controller action.'); ?><br />
		<?php echo Rights::t('core', 'Tasks exist below roles in the authorization hierarchy and can therefore only inherit from other tasks and/or operations.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', 'Create a new task'), array('authItem/create', 'type'=>CAuthItem::TYPE_TASK), array(
		'class'=>'add-task-link',
	)); ?></p>

	<?php $this->renderPartial('tasksgrid', array('dataProvider'=>$dataProvider)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>