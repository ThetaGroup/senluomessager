<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'修改用户',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'查看用户', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理用户', 'url'=>array('admin')),
);
?>

<h1>修改用户 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>