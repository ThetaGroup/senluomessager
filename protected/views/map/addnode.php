<?php
/* @var $this MapController */
/* @var $model Map */

	Yii::app()->clientScript->registerCoreScript('jquery');

$this->breadcrumbs=array(
	'终端预定义'=>array('index'),
	'添加终端',
);

$this->menu=array(
	array('label'=>'管理终端', 'url'=>array('admin')),
);
?>


<h1>添加终端</h1>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/maphandler.js"></script>
<script type="text/javascript">
  window.onload = function(){
      bindEvent();
      loadMark();
  };
</script>

<div id="container">
    <div id="map">
        <img src="<?php echo Yii::app()->request->baseUrl;?>/images/1.jpg" />
    </div>
</div>
<br />

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


