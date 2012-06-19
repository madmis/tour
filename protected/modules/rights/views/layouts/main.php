<?php $this->beginContent(Rights::module()->appLayout); ?>

<!--<div id="rights" class="container">-->
<div id="content" class="pane ui-layout-center span-16">        
	<?php $this->renderPartial('/_flash'); ?>
	<?php echo $content; ?>
</div>

<div class="pane ui-layout-east container">	
	<?php if ($this->id !== 'install'): ?>
		<div id="menu">
			<?php $this->renderPartial('/_menu'); ?>
		</div>
	<?php endif; ?>
</div>

<?php $this->endContent(); ?>