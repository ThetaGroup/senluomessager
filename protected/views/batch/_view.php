<?php
/* @var $this BatchController */
/* @var $data Batch */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batchname')); ?>:</b>
	<?php echo CHtml::encode($data->batchname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback')); ?>:</b>
	<?php echo CHtml::encode($data->feedback); ?>
	<br />


</div>