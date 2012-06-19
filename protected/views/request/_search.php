<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buyer'); ?>
		<?php echo $form->textField($model,'buyer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_cost'); ?>
		<?php echo $form->textField($model,'base_cost',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'org'); ?>
		<?php echo $form->textField($model,'org',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'officer'); ?>
		<?php echo $form->textField($model,'officer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'program'); ?>
		<?php echo $form->textArea($model,'program',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blocked'); ?>
		<?php echo $form->textField($model,'blocked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'archived'); ?>
		<?php echo $form->textField($model,'archived'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_status'); ?>
		<?php echo $form->textField($model,'pay_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_date'); ?>
		<?php echo $form->textField($model,'pay_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'non_cash'); ?>
		<?php echo $form->textField($model,'non_cash'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->