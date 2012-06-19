<?php $this->breadcrumbs = array(
	Rights::t('core', 'Rights')=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/rights/generator.css" />

<div id="generator">

	<h3><?php echo Rights::t('core', 'Generate items'); ?></h3>

	<p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>

	<?php /** @var BootActiveForm $form */
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id'=>'verticalForm',
		'htmlOptions'=>array('class'=>'well'),
	)); ?>

		<table class="items generate-item-table" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr class="application-heading-row">
					<th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
				</tr>

				<?php $this->renderPartial('_generateItems', array(
					'model'=>$model,
					'form'=>$form,
					'items'=>$items,
					'existingItems'=>$existingItems,
					'displayModuleHeadingRow'=>true,
					'basePathLength'=>strlen(Yii::app()->basePath),
				)); ?>
			</tbody>
		</table>

		<div class="form-actions">
		<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
				'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
				'class'=>'btn')); ?>
		<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
				'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
				'class'=>'btn')); ?>

		<?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> ' . Rights::t('core', 'Generate'),
									array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		</div>

	<?php $this->endWidget(); ?>

</div>