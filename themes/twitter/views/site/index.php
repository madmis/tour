<?php $this->pageTitle = Yii::app()->name; ?>

<!--<h1><i><?php //echo CHtml::encode(Yii::app()->name); ?></i></h1>-->

<div style="margin: 0 20px;">
	<h3><?php echo Yii::t('app', 'Администрирование'); ?></h3>
	<ul class="thumbnails" style="margin-top: 10px;">
		<li class="span2">
			<div class="thumbnail">
				<?php
				/* echo CHtml::link(
				  CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/users.png', Yii::t('app', 'Пользователи')),
				  array('/user/admin')
				  ); */
				echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/users.png', Yii::t('app', 'Пользователи'));
				?>
				<br/>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Пользователи'), array('/user/admin')); ?></div>
			</div>
		</li>
		<?php if (Yii::app()->user->checkAccess(Rights::module()->superuserName)) : ?>
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/roles-rights.png', Yii::t('app', 'Роли и права')); ?>
				<br/>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Роли и права'), array('/rights')); ?></div>
			</div>
		</li>
		<?php endif; ?>
		<?php if (Yii::app()->user->checkAccess(Rights::module()->superuserName)) : ?>
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/user-action-log.png', Yii::t('app', 'Журнал действий пользователей')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Журнал действий пользователей'), array('/userActionLog/admin')); ?></div>
			</div>
		</li>
		<?php endif; ?>
	</ul>

	<h3><?php echo Yii::t('app', 'Справочники'); ?></h3>
	<ul class="thumbnails" style="margin-top: 10px;">
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/clients.png', Yii::t('app', 'Клиенты')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Клиенты'), array('/clients/admin')); ?></div>
			</div>
		</li>
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/currency.png', Yii::t('app', 'Валюты')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Валюты'), array('/currency/admin')); ?></div>
			</div>
		</li>
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/currency-rate.png', Yii::t('app', 'Курсы валют')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Курсы валют'), array('/currencyRate/admin')); ?></div>
			</div>
		</li>
	</ul>


	<h3><?php echo Yii::t('app', 'Заявки'); ?></h3>
	<ul class="thumbnails" style="margin-top: 10px;">
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/request-current.png', Yii::t('app', 'Текущие')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Текущие'), array('/request/admin')); ?></div>
			</div>
		</li>
		<li class="span2">
			<div class="thumbnail">
				<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/main-icons/request-archived.png', Yii::t('app', 'Архив')); ?>
				<div style="text-align: center; margin-top: 10px;"><?php echo CHtml::link(Yii::t('app', 'Архив'), array('/request/archived')); ?></div>
			</div>
		</li>
	</ul>
</div>