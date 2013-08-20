<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 登录';
$this->breadcrumbs=array(
	'登录',
);
?>
	
</div>

<div class="auth-form" id="login">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',		
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<div class="auth-form-header">
			登录
		</div>
		
		<div class="auth-form-body">
			<p class="note">带<span class="required">*</span>的方框不能为空.</p>
		
			<div class="row">
				<?php echo $form->labelEx($model,'用户名'); ?>
				<?php echo $form->textField($model,'username'); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
		
			<div class="row">
				<?php echo $form->labelEx($model,'密码'); ?>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
		
			<div class="row rememberMe">
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>
		
			<div class="row buttons">
				<?php 
					echo CHtml::submitButton('登录',array("class"=>"minibutton"));					
				?>
			</div>
		</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->

