<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'horizontalForm',
	'htmlOptions'=>array('class'=>'well'),
//	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'inlineErrors' => false,
)); ?>

	<fieldset>
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3','maxlength'=>128)); ?>
		<?php if ($model->isNewRecord): ?>
			<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3','maxlength'=>128)); ?>
		<?php else: ?>
			<?php echo $form->passwordFieldRow($model, 'npassword', array('class'=>'span3','maxlength'=>128)); ?>
		<?php endif; ?>
		<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3','maxlength'=>128)); ?>
	</fieldset>
	<div class="form-actions">
		<?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> ' . Yii::t('app', 'Сохранить'),
										array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-ban-circle"></i> ' . Yii::t('app', 'Очистить'),
									array('class'=>'btn', 'type'=>'reset')); ?>
	</div>

	<p class="help-block">
		<span class="label label-info">Info</span>&nbsp;
		<?php echo Yii::t('app', 'Поля, отмеченные <span class="required">*</span> обязательны для заполнения.'); ?>
	</p>

<?php $this->endWidget(); ?>