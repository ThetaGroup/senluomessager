<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'终端预定义'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'添加终端', 'url'=>array('addnode')),
	array('label'=>'修改终端', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除终端', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除这条数据吗？')),
	array('label'=>'管理终端', 'url'=>array('admin')),
);
?>

<h1>查看 终端 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'lng',
		'lat',
		'tel',
	),
)); ?>
