<?php
$this->breadcrumbs=array(
	Yii::t('app', 'Пользователи')=>array('admin'),
	Yii::t('app', 'Управление пользователями'),
);
?>

<h3><?php echo Yii::t('app', 'Управление пользователями'); ?></h3>

<?php $this->renderPartial('admingrid', array('model'=>$model)); ?>
<?php //$this->renderPartial('viewdialog'); ?>

<?php $this->renderPartial('menu', array('model'=>$model)); ?>
