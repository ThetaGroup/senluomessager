<?php
/* @var $this BatchController */
/* @var $model Batch */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'batch-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">带<span class="required">*</span>的方框不能为空.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'名称'); ?>
		<?php echo $form->textField($model,'batchname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'batchname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'内容'); ?>
		<?php echo $form->textField($model,'body',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'反馈'); ?>
		<?php echo $form->textField($model,'feedback',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'feedback'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? '新建' : '保存'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->