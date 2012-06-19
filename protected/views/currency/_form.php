<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISOChar'); ?>
		<?php echo $form->textField($model,'ISOChar',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ISOChar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISONum'); ?>
		<?php echo $form->textField($model,'ISONum',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ISONum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base'); ?>
		<?php echo $form->textField($model,'base'); ?>
		<?php echo $form->error($model,'base'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->