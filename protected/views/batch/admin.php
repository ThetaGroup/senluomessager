<?php
/* @var $this BatchController */
/* @var $model Batch */

$this->breadcrumbs=array(
	'控制指令',
	'控制指令管理',
);

$this->menu=array(
	array('label'=>'新建控制指令', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#batch-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>控制指令管理</h1>

<p>
您可以在您的搜索值前方加入(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>)等符号来完善您的搜索条件.
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
</p>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'batch-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'batchname',
		'body',
		'feedback',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
