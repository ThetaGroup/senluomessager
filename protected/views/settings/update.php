<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'修改设置',
);

$this->menu=array(
	//array('label'=>'List Settings', 'url'=>array('index')),
	//array('label'=>'Create Settings', 'url'=>array('create')),
	array('label'=>'查看设置', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理设置', 'url'=>array('admin')),
);
?>

<h1>修改设置 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>