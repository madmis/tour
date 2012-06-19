<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="content" class="ui-layout-center">
	<?php $this->renderPartial('/_flash'); ?>
	<?php echo $content; ?>
</div>

<div class="ui-layout-east">	
	<?php if ($this->id !== 'install'): ?>
		<div id="menu">
			<?php $this->renderPartial('/_menu'); ?>
		</div>
	<?php endif; ?>
</div>

<?php Yii::app()->clientScript->registerScript(
	'myLayout', "myLayout = $('#container').layout({ 
		east__applyDefaultStyles: true, east__resizable: true, east__closable: true, east__size: 250,
		north__resizable: false, north__closable: false, north__spacing_open: -18
	});
	myLayout.panes.center.css('overflow','auto');
	myLayout.panes.east.css('overflow-y','none');
	myLayout.panes.east.css('border-top','none');
	myLayout.panes.east.css('border-bottom','none');"
); ?>

<?php $this->endContent(); ?>