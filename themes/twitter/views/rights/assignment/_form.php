<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
<fieldset>
 
    <legend><?php echo Rights::t('core', 'Assign item'); ?></legend>
	<?php echo $form->dropDownListRow($model, 'itemname', $itemnameSelectOptions); ?>
</fieldset>
<div class="form-actions">
	<?php echo CHtml::htmlButton('<i class="icon-ok icon-white"></i> ' . Yii::t('app', 'Назначить'),
								array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
</div>
<?php $this->endWidget(); ?>