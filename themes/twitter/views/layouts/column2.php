<?php $this->beginContent('//layouts/main'); ?>

<div id="content" class="ui-layout-center">
	<?php echo $content; ?>
</div>

<div class="ui-layout-east">
	<?php $this->widget('bootstrap.widgets.BootMenu', array(
		'type'=>'list',
		'items'=>$this->menu,
	)); ?>
</div>

<?php foreach ($this->dialog as $value):
	echo $value;
endforeach ?>

<?php $this->endContent(); ?>