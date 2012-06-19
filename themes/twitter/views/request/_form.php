<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id'=>'request-form',
	'htmlOptions'=>array('class'=>'well'),
	'type'=>'horizontal',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>false,
	),
	'inlineErrors' => false,
)); ?>

	<fieldset>
		<?php echo $form->errorSummary($model); ?>
		<?php echo $form->textFieldRow($model, 'number', array('disabled'=>true, 'class'=>'span2','maxlength'=>20)); ?>
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
						'buttonText'=>'Укажите дату заявки',
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
		<?php echo $form->hiddenField($model, 'buyer', array('id'=>'buyer')); ?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'buyer_name', array('class'=>'control-label', 'for'=>'buyer-name')); ?>
			<div class="controls">
				<?php echo $form->textField($model, 'buyer_name', 
						array(
							'class'=>'span5',
							'id'=>'buyer-name',
							'readonly'=>true,
							'rel'=>'tooltip',
							'title'=>'Выберите покупателя из справочника',
						)
				); ?>
				<?php //echo $form->textFieldRow($model, 'buyer_name', array('class'=>'span5','id'=>'Request_buyer_name')); ?>
				<?php echo CHtml::link('...', '#select-clients',
						array(
							'class'=>'btn btn-primary',
							'style'=>'vertical-align: top; margin-left: -4px;',
							/*'data-title'=>'Heading',*/
							/*'data-content'=>'Укажите покупателя',*/
							'data-toggle'=>'modal',
							'rel'=>'tooltip',
							'title'=>'Выберите покупателя из справочника',
							/*'rel'=>'popover',*/
						)
				); ?>
				<?php echo $form->error($model,'buyer_name', array('inputID'=>'buyer-name')); ?>
			</div>
		</div>

		<?php echo $form->textFieldRow($model, 'base_cost', 
				array(
					'class'=>'span2',
					'maxlength'=>9,
					'rel'=>'tooltip',
					'title'=>'Разделителем суммы является точка. Пример: 258.45',
				)
		); ?>

		<?php //echo $form->dropDownListRow($model, 'currency', array('UAH'=>'UAH','EUR'=>'EUR','USD'=>'USD'), array('class'=>'span2')); ?>
		<?php echo $form->hiddenField($model, 'currency_rate', array('id'=>'currency')); ?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'currency_name', array('class'=>'control-label', 'for'=>'currency-name')); ?>
			<div class="controls">
				<?php echo $form->textField($model, 'currency_name', 
						array(
							'class'=>'span2',
							'id'=>'currency-name',
							'readonly'=>true,
							/*'rel'=>'tooltip',
							'title'=>'Выберите курс валюты из справочника',*/
						)
				); ?>
				<?php echo CHtml::link('...', '#select-currencyRate',
						array(
							'class'=>'btn btn-primary',
							'style'=>'vertical-align: top; margin-left: -4px;',
							/*'data-title'=>'Heading',*/
							/*'data-content'=>'Укажите покупателя',*/
							'data-toggle'=>'modal',
							'rel'=>'tooltip',
							'title'=>'Выберите курс валюты из справочника',
							/*'rel'=>'popover',*/
						)
				); ?>
				<?php echo $form->error($model,'currency_name', array('inputID'=>'currency-name')); ?>
			</div>
		</div>

		<?php echo $form->textFieldRow($model, 'discount', 
				array(
					'class'=>'span2',
					'maxlength'=>5,
					'rel'=>'tooltip',
					'title'=>'Разделителем дробной части процента является точка. Пример: 55.5',
				)
		); ?>
		<?php echo $form->textAreaRow($model, 'comment', array('class'=>'span6', 'rows'=>5)); ?>
		<?php echo $form->textFieldRow($model, 'org', array('class'=>'span5','maxlength'=>255)); ?>
		<?php echo $form->hiddenField($model, 'officer', array('id'=>'officer')); ?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'officer_name', array('class'=>'control-label','for'=>'officer-name')); ?>
			<div class="controls">
				<?php echo $form->textField($model, 'officer_name', 
						array(
							'class'=>'span5',
							'id'=>'officer-name',
							'readonly'=>true,
							'maxlength'=>255,
							'rel'=>'tooltip',
							'title'=>'Выберите ответственного пользователя из справочника',
						)
				); ?>
				<?php echo CHtml::link('...', '#select-user',
						array(
							'class'=>'btn btn-primary',
							'style'=>'vertical-align: top; margin-left: -4px;',
							'data-toggle'=>'modal',
							'rel'=>'tooltip',
							'title'=>'Выберите ответственного пользователя из справочника',
						)
				); ?>
				<?php echo $form->error($model,'officer_name', array('inputID'=>'officer-name')); ?>
			</div>
		</div>

		<?php echo $form->textFieldRow($model, 'program', array('class'=>'span5','maxlength'=>255)); ?>
		<?php echo $form->checkBoxRow($model, 'blocked', array('class'=>'inline')); ?>
		<?php echo $form->checkBoxRow($model, 'archived', array('class'=>'inline')); ?>
		<?php echo $form->dropDownListRow($model, 'pay_status',
				array(1=>'Оплачена',0=>'Не оплачена',), 
				array('class'=>'span2')
		); ?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'pay_date', array('class'=>'control-label', 'for'=>'pay-date')); ?>
			<div class="controls">
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,
					'attribute'=>'pay_date',
					// additional javascript options for the date picker plugin
					'options'=>array(
						'showAnim'=>'fold',
						'buttonImage'=>Yii::app()->theme->baseUrl . '/images/date.png',
						'buttonImageOnly'=>true,
						'buttonText'=>'Укажите дату предполагаемой оплаты',
                        'showOn'=>'button',
					),
					'htmlOptions'=>array(
						'class'=>'span2',
						'id'=>'pay-date',
						'readonly'=>true,
						'rel'=>'tooltip',
						'title'=>'Выберите дату в календаре',
					),
					'language'=>Yii::app()->language,
				)); ?>
				<?php echo $form->error($model,'pay_date', array('inputID'=>'pay-date')); ?>
			</div>
		</div>
		<?php echo $form->checkBoxRow($model, 'non_cash'); ?>
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

<?php 
	// Диалог выбора клиента
	$this->dialog[] = $this->widget('ext.selectDialog.SelectDialog', 
								array(
									'model'=>'Clients',
									'fieldId'=>'buyer',
									'fieldName'=>'buyer-name',
									'title'=>Yii::t('app', 'Клиенты'),
								), 
								true
						);
	// Диалог выбора пользователя
	$this->dialog[] = $this->widget('ext.selectDialog.SelectDialog', 
								array(
									'model'=>'User',
									'fieldId'=>'officer',
									'fieldName'=>'officer-name',
									'title'=>Yii::t('app', 'Пользователи'),
								),
								true
						);
	// Диалог выбора курсов валют
	$this->dialog[] = $this->widget('ext.selectDialog.SelectDialog', 
								array(
									'model'=>'currencyRate',
									'fieldId'=>'currency',
									'fieldName'=>'currency-name',
									'title'=>Yii::t('app', 'Курсы валют'),
								), 
								true
						);
?>