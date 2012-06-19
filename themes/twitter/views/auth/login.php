<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'inlineErrors' => false,
)); ?>

<div style="margin: 0 auto; width: 400px;">
	<fieldset>
		<legend><?php echo Yii::t('app', 'Авторизация'); ?></legend>
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
		<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
		<?php echo $form->checkboxRow($model,'rememberMe'); ?>
	</fieldset>
	<div class="form-actions">
		<?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> Submit', array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-ban-circle"></i> Reset', array('class'=>'btn', 'type'=>'reset')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>