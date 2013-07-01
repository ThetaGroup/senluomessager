<?php
/* @var $this MapController */
/* @var $model Map */

$this->breadcrumbs=array(
	'终端预定义'=>array('index'),
	'终端管理',
);

$this->menu=array(
	array('label'=>'添加终端', 'url'=>array('addnode')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#map-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>预定义终端管理</h1>

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
	'id'=>'map-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'lng',
		//'lat',
		'tel',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
