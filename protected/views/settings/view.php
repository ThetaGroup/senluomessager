<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	$model->name,
);

$this->menu=array(
	//array('label'=>'List Settings', 'url'=>array('index')),
	//array('label'=>'Create Settings', 'url'=>array('create')),
	array('label'=>'修改设置', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除设置', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除这条数据吗？')),
	array('label'=>'管理设置', 'url'=>array('admin')),
);
?>

<h1>查看设置 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'value',
	),
)); ?>
