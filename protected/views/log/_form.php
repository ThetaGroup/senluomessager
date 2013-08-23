<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'log_time'); ?>
		<?php echo $form->textField($model,'log_time'); ?>
		<?php echo $form->error($model,'log_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_content'); ?>
		<?php echo $form->textField($model,'log_content',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'log_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_state'); ?>
		<?php echo $form->textField($model,'log_state',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'log_state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->