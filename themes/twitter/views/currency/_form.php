<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'currency-form',
    'htmlOptions'=>array('class'=>'well'),
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true, 
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'inlineErrors' => false,
)); ?>

	<?php //var_dump($model); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3', 'maxlength'=>100)); ?>
	<?php echo $form->textFieldRow($model, 'ISOChar', array('class'=>'span2','maxlength'=>3)); ?>
	<?php echo $form->textFieldRow($model, 'ISONum', array('class'=>'span2','maxlength'=>3)); ?>
	<?php echo $form->checkBoxRow($model, 'base', array(
													'class'=>'inline',
													//'readonly'=>($this->getBaseCurrency() != null),
													'disabled'=>(Currency::getBaseCurrency() != null && $model->getAttribute('base') == 0),
												)); ?>

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