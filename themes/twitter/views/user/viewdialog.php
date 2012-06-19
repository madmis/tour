<?php $this->beginWidget('bootstrap.widgets.BootModal', array(
    'id'=>'modal',
    'htmlOptions'=>array('class'=>'hide'),
    'events'=>array(
        'show'=>"js:function() { console.log('modal show.'); }",
        'shown'=>"js:function() { console.log('modal shown.'); }",
        'hide'=>"js:function() { console.log('modal hide.'); }",
        'hidden'=>"js:function() { console.log('modal hidden.'); }",
    ),
)); ?>
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3>Modal header</h3>
	</div>
	<div class="modal-body">
		<p>One fine body…</p>
	</div>
	<div class="modal-footer">
		<?php //echo CHtml::link('Save changes', '#', array('class'=>'btn btn-primary', 'data-dismiss'=>'modal')); ?>
		<?php echo CHtml::link('Close', '#', array('class'=>'btn', 'data-dismiss'=>'modal')); ?>
	</div>
<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript(
	"test",
	"
	jQuery('#userGrid a.view1').live('click',function() {
		jQuery.ajax({
			type: 'POST',
			url: $(this).attr('href'),
			success: function(data){
				jQuery('#modal div.modal-body').html(data);
				jQuery('#modal').modal({ backdrop: false });
			}
		});
	});",
	CClientScript::POS_READY
  ); ?>