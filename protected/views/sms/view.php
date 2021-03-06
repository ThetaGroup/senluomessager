<?php
/* @var $this SmsController */
/* @var $model Sms */

$this->breadcrumbs=array(
	'Sms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sms', 'url'=>array('index')),
	array('label'=>'Create Sms', 'url'=>array('create')),
	array('label'=>'Update Sms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sms', 'url'=>array('admin')),
);
?>

<h1>View Sms #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'address',
		'datehandle',
		'read',
		'type',
		'body',
		'seen',
	),
)); ?>
