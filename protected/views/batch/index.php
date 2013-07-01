<?php
/* @var $this BatchController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'控制指令',
);

$this->menu=array(
	array('label'=>'Create Batch', 'url'=>array('create')),
	array('label'=>'Manage Batch', 'url'=>array('admin')),
);
?>

<h1>Batches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
