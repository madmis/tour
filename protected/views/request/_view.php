<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buyer')); ?>:</b>
	<?php echo CHtml::encode($data->buyer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_cost')); ?>:</b>
	<?php echo CHtml::encode($data->base_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org')); ?>:</b>
	<?php echo CHtml::encode($data->org); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('officer')); ?>:</b>
	<?php echo CHtml::encode($data->officer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program')); ?>:</b>
	<?php echo CHtml::encode($data->program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blocked')); ?>:</b>
	<?php echo CHtml::encode($data->blocked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archived')); ?>:</b>
	<?php echo CHtml::encode($data->archived); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_status')); ?>:</b>
	<?php echo CHtml::encode($data->pay_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_date')); ?>:</b>
	<?php echo CHtml::encode($data->pay_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('non_cash')); ?>:</b>
	<?php echo CHtml::encode($data->non_cash); ?>
	<br />

	*/ ?>

</div>