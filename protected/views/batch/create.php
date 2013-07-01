<?php
/* @var $this BatchController */
/* @var $model Batch */

$this->breadcrumbs=array(
	'控制指令',
	'新建控制指令',
);

$this->menu=array(
	array('label'=>'控制指令管理', 'url'=>array('admin')),
);
?>

<h1>新建控制指令</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>