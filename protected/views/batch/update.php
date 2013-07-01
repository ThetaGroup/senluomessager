<?php
/* @var $this BatchController */
/* @var $model Batch */

$this->breadcrumbs=array(
	'控制指令',
	$model->batchname=>array('view','id'=>$model->id),
	'修改控制指令',
);

$this->menu=array(
	array('label'=>'新建控制指令', 'url'=>array('create')),
	array('label'=>'查看控制指令', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理控制指令', 'url'=>array('admin')),
);
?>

<h1>修改控制指令 <?php echo $model->batchname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>