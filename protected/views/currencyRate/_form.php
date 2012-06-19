<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-rate-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parentId'); ?>
		<?php echo $form->textField($model,'parentId'); ?>
		<?php echo $form->error($model,'parentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rate'); ?>
		<?php echo $form->textField($model,'rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currencyId'); ?>
		<?php echo $form->textField($model,'currencyId'); ?>
		<?php echo $form->error($model,'currencyId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->