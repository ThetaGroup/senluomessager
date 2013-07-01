<?php
/* @var $this BatchController */
/* @var $model Batch */

$this->breadcrumbs=array(
	'控制指令',
	$model->batchname,
);

$this->menu=array(
	array('label'=>'新建控制指令', 'url'=>array('create')),
	array('label'=>'修改控制指令', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除控制指令', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除这条数据吗？')),
	array('label'=>'管理控制指令', 'url'=>array('admin')),
);
?>

<h1>查看控制指令 <?php echo $model->batchname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'batchname',
		'body',
		'feedback',
	),
)); ?>
