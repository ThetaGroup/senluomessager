<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户管理'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'修改用户', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'删除用户', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'确定要删除这条数据吗？')),
	array('label'=>'管理用户', 'url'=>array('admin')),
);
?>

<h1>查看用户 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'address',
		'role',
	),
)); ?>
