<?php
/* @var $this LogController */
/* @var $model Log */

$this->breadcrumbs=array(
	'系统日志'
);

$this->menu=array(
	//array('label'=>'List Log', 'url'=>array('index')),
	//array('label'=>'Create Log', 'url'=>array('create')),
	array('label'=>'系统日志','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#log-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>系统日志</h1>

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
	'id'=>'log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'log_time',
		'log_content',
		'log_state',
		// array(
			// 'class'=>'CButtonColumn',
		// ),
	),
)); ?>
