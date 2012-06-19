<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Roles'),
); ?>

<div id="roles">

	<h3><?php echo Rights::t('core', 'Roles'); ?></h3>

	<p>
		<?php echo Rights::t('core', 'A role is group of permissions to perform a variety of tasks and operations, for example the authenticated user.'); ?><br />
		<?php echo Rights::t('core', 'Roles exist at the top of the authorization hierarchy and can therefore inherit from other roles, tasks and/or operations.'); ?>
	</p>

	<p><?php echo CHtml::link(Rights::t('core', 'Create a new role'), array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE), array(
	   	'class'=>'add-role-link',
	)); ?></p>

	<?php $this->renderPartial('rolesgrid', array('dataProvider'=>$dataProvider)); ?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

</div>