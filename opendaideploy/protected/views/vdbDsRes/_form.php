<?php
/* @var $this VdbDsResController */
/* @var $model VdbDsRes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vdb-ds-res-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jndi'); ?>
		<?php echo $form->textField($model,'jndi',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'jndi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poolname'); ?>
		<?php echo $form->textField($model,'poolname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'poolname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'driver'); ?>
		<?php echo $form->textField($model,'driver',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'driver'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dbname'); ?>
		<?php echo $form->textField($model,'dbname',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'dbname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dbuser'); ?>
		<?php echo $form->textField($model,'dbuser',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'dbuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'connectionurl'); ?>
		<?php echo $form->textField($model,'connectionurl',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'connectionurl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->textField($model,'file',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vdb_id'); ?>
		<?php echo $form->textField($model,'vdb_id'); ?>
		<?php echo $form->error($model,'vdb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'need_refresh'); ?>
		<?php echo $form->textField($model,'need_refresh'); ?>
		<?php echo $form->error($model,'need_refresh'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'process'); ?>
		<?php echo $form->textField($model,'process'); ?>
		<?php echo $form->error($model,'process'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->