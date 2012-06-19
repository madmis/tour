<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Operations'),
); ?>

<div id="operations">

	<h3><?php echo Rights::t('core', 'Operations'); ?></h3>

	<p>
		<?php echo Rights::t('core', 'An operation is a permission to perform a single operation, for example accessing a certain controller action.'); ?><br />
		<?php echo Rights::t('core', 'Operations exist below tasks in the authorization hierarchy and can therefore only inherit from other operations.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', 'Create a new operation'), array('authItem/create', 'type'=>CAuthItem::TYPE_OPERATION), array(
		'class'=>'add-operation-link',
	)); ?></p>

	<?php $this->renderPartial('operationgrid', array('dataProvider'=>$dataProvider)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>