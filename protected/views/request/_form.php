<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buyer'); ?>
		<?php echo $form->textField($model,'buyer'); ?>
		<?php echo $form->error($model,'buyer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_cost'); ?>
		<?php echo $form->textField($model,'base_cost',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'base_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'org'); ?>
		<?php echo $form->textField($model,'org',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'org'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'officer'); ?>
		<?php echo $form->textField($model,'officer'); ?>
		<?php echo $form->error($model,'officer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'program'); ?>
		<?php echo $form->textArea($model,'program',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'program'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blocked'); ?>
		<?php echo $form->textField($model,'blocked'); ?>
		<?php echo $form->error($model,'blocked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archived'); ?>
		<?php echo $form->textField($model,'archived'); ?>
		<?php echo $form->error($model,'archived'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_status'); ?>
		<?php echo $form->textField($model,'pay_status'); ?>
		<?php echo $form->error($model,'pay_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_date'); ?>
		<?php echo $form->textField($model,'pay_date'); ?>
		<?php echo $form->error($model,'pay_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'non_cash'); ?>
		<?php echo $form->textField($model,'non_cash'); ?>
		<?php echo $form->error($model,'non_cash'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->