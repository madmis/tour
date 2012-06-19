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

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model, 'fio', array('class'=>'span7')); ?>
	<?php echo $form->textAreaRow($model, 'address', array('class'=>'span7', 'rows'=>4)); ?>
	<?php echo $form->textFieldRow($model, 'phone', array('class'=>'span3','maxlength'=>25)); ?>
	<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3','maxlength'=>150)); ?>
	<?php echo $form->textAreaRow($model, 'comment', array('class'=>'span7', 'rows'=>6, 'hint'=>'Комментарий к записи')); ?>

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