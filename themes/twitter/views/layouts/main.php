<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="ru" />

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap/hack.css" />
		<?php Yii::app()->clientScript->registerScriptFile('/js/jquery.layout.js'); ?>
		<?php Yii::app()->getClientScript()->registerScriptFile(
				Yii::app()->clientScript->getCoreScriptUrl() . '/jui/js/jquery-ui.min.js'); ?>
		<?php Yii::app()->clientScript->registerCssFile(
				Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'); ?>

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>

		<?php Yii::app()->clientScript->registerScript(
			'myLayout', "myLayout = $('#container').layout({
				east__applyDefaultStyles: true, east__resizable: true, east__closable: true, east__size: 250,
				north__resizable: false, north__closable: false, north__spacing_open: -18
			});
			myLayout.allowOverflow('north');
			myLayout.panes.center.css('overflow','auto');
			if (myLayout.panes.east) {
				myLayout.panes.east.css('overflow-y','none');
				myLayout.panes.east.css('border-top','none');
				myLayout.panes.east.css('border-bottom','none');
			}",
			CClientScript::POS_LOAD
		); ?>

	</head>

	<body>
		<div id="container">
			<div class="ui-layout-north">
				<?php $this->renderPartial('//layouts/navBar'); ?>

				<?php if (isset($this->breadcrumbs)): ?>
				<div id="breadcrumbs">
					<?php $this->widget('bootstrap.widgets.BootCrumb', array('links' => $this->breadcrumbs,)); ?>
				</div>
				<?php endif ?>
			</div>

			<?php echo $content; ?>
		</div>
	</body>
</html>