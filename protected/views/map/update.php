<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'终端预定义'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'修改终端',
);

$this->menu=array(
	array('label'=>'添加终端', 'url'=>array('addnode')),
	array('label'=>'查看终端', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'管理终端', 'url'=>array('admin')),
);
?>

<h1>修改终端 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>