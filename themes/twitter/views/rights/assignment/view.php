<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Assignments'),
); ?>

<div id="assignments">
	<h3><?php echo Rights::t('core', 'Assignments'); ?></h3>
	<p><?php echo Rights::t('core', 'Here you can view which permissions has been assigned to each user.'); ?></p>
	<?php $this->renderPartial('viewgrid', array('model'=>$model)); ?>
</div>