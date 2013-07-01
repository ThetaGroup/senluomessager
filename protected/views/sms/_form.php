<?php
/* @var $this SmsController */
/* @var $model Sms */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datehandle'); ?>
		<?php echo $form->textField($model,'datehandle'); ?>
		<?php echo $form->error($model,'datehandle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'read'); ?>
		<?php echo $form->checkBox($model,'read'); ?>
		<?php echo $form->error($model,'read'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textField($model,'body',array('size'=>60,'maxlength'=>160)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seen'); ?>
		<?php echo $form->checkBox($model,'seen'); ?>
		<?php echo $form->error($model,'seen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->