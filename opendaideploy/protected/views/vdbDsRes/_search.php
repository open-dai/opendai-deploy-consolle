<?php
/* @var $this VdbDsResController */
/* @var $model VdbDsRes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jndi'); ?>
		<?php echo $form->textField($model,'jndi',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poolname'); ?>
		<?php echo $form->textField($model,'poolname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'driver'); ?>
		<?php echo $form->textField($model,'driver',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dbname'); ?>
		<?php echo $form->textField($model,'dbname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dbuser'); ?>
		<?php echo $form->textField($model,'dbuser',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'connectionurl'); ?>
		<?php echo $form->textField($model,'connectionurl',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'file'); ?>
		<?php echo $form->textField($model,'file',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vdb_id'); ?>
		<?php echo $form->textField($model,'vdb_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'need_refresh'); ?>
		<?php echo $form->textField($model,'need_refresh'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'process'); ?>
		<?php echo $form->textField($model,'process'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->