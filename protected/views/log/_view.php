<?php
/* @var $this LogController */
/* @var $data Log */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_time')); ?>:</b>
	<?php echo CHtml::encode($data->log_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_content')); ?>:</b>
	<?php echo CHtml::encode($data->log_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_state')); ?>:</b>
	<?php echo CHtml::encode($data->log_state); ?>
	<br />


</div>