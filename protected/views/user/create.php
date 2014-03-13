<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('index'),
	'添加用户',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'用户管理', 'url'=>array('admin')),
);
?>

<h1>添加用户</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>



<?php
	Yii::app()->clientScript->registerCoreScript('jquery');
?>

<script type="text/javascript">
	$("#User_role").attr("readonly","readonly").val("0");
</script>