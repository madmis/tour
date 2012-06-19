<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'currency-rate-form',
	'htmlOptions'=>array('class'=>'well'),
	'type'=>'horizontal',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'inlineErrors' => false,
)); ?>

	<?php
	if ( Currency::getBaseCurrency() == null ) : 
		$this->widget('bootstrap.widgets.BootAlert');
	else : 
	?>
		<fieldset>
			<?php echo $form->errorSummary($model); ?>
			<div class="control-group">
				<?php echo $form->labelEx($model,'date', array('class'=>'control-label', 'for'=>'date')); ?>
				<div class="controls">
					<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=>$model,
						'attribute'=>'date',
						// additional javascript options for the date picker plugin
						'options'=>array(
							'showAnim'=>'fold',
							'buttonImage'=>Yii::app()->theme->baseUrl . '/images/date.png',
							'buttonImageOnly'=>true,
							'buttonText'=>'Укажите дату курса',
							'showOn'=>'button',
						),
						'htmlOptions'=>array(
							'class'=>'span2',
							'id'=>'date',
							'readonly'=>true,
							'rel'=>'tooltip',
							'title'=>'Выберите дату в календаре',
						),
						'language'=>Yii::app()->language,
					)); ?>
					<?php echo $form->error($model,'date', array('inputID'=>'date')); ?>
				</div>
			</div>
			<?php echo $form->hiddenField($model, 'currencyId', array('id'=>'currencyId')); ?>
			<div class="control-group">
				<?php echo $form->labelEx($model,'currency_name', array('class'=>'control-label', 'for'=>'currency-name')); ?>
				<div class="controls">
					<?php echo $form->textField($model, 'currency_name', 
							array(
								'class'=>'span2',
								'id'=>'currency-name',
								'readonly'=>true,
								'rel'=>'tooltip',
								'title'=>'Выберите валюту из справочника',
							)
					); ?>
					<?php echo CHtml::link('...', '#select-currency',
							array(
								'class'=>'btn btn-primary',
								'style'=>'vertical-align: top; margin-left: -4px;',
								/*'data-title'=>'Heading',*/
								/*'data-content'=>'Укажите покупателя',*/
								'data-toggle'=>'modal',
								'rel'=>'tooltip',
								'title'=>'Выберите валюту из справочника',
								/*'rel'=>'popover',*/
							)
					); ?>

					<?php echo $form->error($model,'currency_name', array('inputID'=>'currency-name')); ?>
				</div>
			</div>
			<?php echo $form->textFieldRow($model, 'unit', 
					array(
						'class'=>'span2',
						'maxlength'=>10,
						'rel'=>'tooltip',
						'title'=>'Количество единиц валюты. Пример: 100',
					)
			); ?>
			<?php /*echo $form->textFieldRow($model, 'parentId', 
					array('class'=>'span2','readonly'=>true, 'value'=>Currency::getBaseCurrency()->getAttribute('name'))
			);*/ ?>
			<?php echo $form->textFieldRow($model, 'rate', 
					array(
						'class'=>'span2',
						'maxlength'=>10,
						'rel'=>'tooltip',
						'title'=>'Курс базовой валюты по отношению к указанной валюте. Пример: 8.04. Разделитель суммы точка.',
					)
			); ?>
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
	<?php endif ?>

<?php $this->endWidget(); ?>

		
<?php $this->dialog[] = $this->widget('ext.selectDialog.SelectDialog', 
									array(
										'model'=>'Currency',
										'fieldId'=>'currencyId',
										'fieldName'=>'currency-name',
										'title'=>Yii::t('app', 'Валюты'),
									), 
									true
						);
?>