<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
); ?>

<div class="createAuthItem">

	<h3><?php echo Rights::t('core', 'Create :type', array(
		':type'=>Rights::getAuthItemTypeName($_GET['type']),
	)); ?></h3>

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>

</div>