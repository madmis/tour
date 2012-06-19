<div class="form span-12 first">
	<?php /** @var BootActiveForm $form */
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id'=>'verticalForm',
		'htmlOptions'=>array('class'=>'well'),
	)); ?>
	<fieldset>

		<?php if( $model->scenario==='update' ): ?>
			<legend><?php echo Rights::getAuthItemTypeName($model->type); ?></legend>
		<?php endif; ?>

		<?php echo $form->textFieldRow($model, 'name', array('maxlength'=>255, 'hint'=> Rights::t('core', 'Do not change the name unless you know what you are doing.'))); ?>
		<?php echo $form->textFieldRow($model, 'description', array('maxlength'=>255, 'hint'=> Rights::t('core', 'A descriptive name for this item.'))); ?>
		<?php echo $form->textFieldRow($model, 'bizRule', array('maxlength'=>255, 'hint'=> Rights::t('core', 'Code that will be executed when performing access checking.'))); ?>
	</fieldset>
	<div class="form-actions">
		<?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> ' . Yii::t('app', 'Сохранить'),
									array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		 <?php echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl, array('class'=>'btn btn-primary btn-danger')); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>