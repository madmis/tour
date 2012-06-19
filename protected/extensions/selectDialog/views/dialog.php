<?php $this->controller->beginWidget('bootstrap.widgets.BootModal', array(
    'id'=>'select-' . $this->getLcModel(),
    'htmlOptions'=>array(
		'class'=>'hide',
		'style'=>'width:800px; height:auto; left:40%;',
	),
    'events'=>array(
        'show'=>"js:function() { /*console.log('modal show.');*/ }",
        'shown'=>"js:function() { /*console.log('modal shown.');*/ }",
        'hide'=>"js:function() { $.fn.selectFromGrid('" . $this->getLcModel() . "','" . $this->fieldId . "','" . $this->fieldName . "'); }",
        'hidden'=>"js:function() { /*console.log('modal hidden.');*/ }",
    ),
)); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3><?php echo Yii::t('app', $this->title); ?></h3>
</div>
<div class="modal-body">
	<?php
		if (Yii::app()->user->checkAccess($this->model . '.DialogSelect')):
			echo $this->grid;
		else:
			echo Yii::t('yii', 'You are not authorized to perform this action.');
		endif
	?>
</div>
<div class="modal-footer">
    <?php echo CHtml::link(Yii::t('app', 'Отмена'), '#', array('class'=>'btn', 'data-dismiss'=>'modal')); ?>
	<?php if (Yii::app()->user->checkAccess($this->model . '.DialogSelect')): ?>
		<?php echo CHtml::link(Yii::t('app', 'Выбрать'), '#', array('class'=>'btn btn-primary okBtn', 'data-dismiss'=>'modal')); ?>
	<?php endif ?>
</div>
<?php $this->controller->endWidget(); ?>