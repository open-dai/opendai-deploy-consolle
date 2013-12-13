<?php
/* @var $this VdbController */
/* @var $model Vdb */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vdb-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vdbfile'); ?>
		<?php echo $form->fileField($model,'vdbfile',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'vdbfile'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	<!-- gioppo -->
<?php
    
	//render the member models
	$this->widget('ext.multimodelform.MultiModelForm',array(
			//a unique widget id
			'id' => 'id_tables',  
			
			//the text for the remove record link
			'removeText' => 'Remove', 
			
			//see the render call in the controller actions create/update 
			//instance of the member model, 
			'model' => $table,  
			
			//array of positions with invalid records
//			'deleteItems' => $errorIndexes, 
			
			//array of member models
			'validatedItems' => $validatedItems, 
			'formConfig' => $table->MultiModelForm,
			
			//array of member models as list of editable members
			'data' => $table->findAll('vdb_id=:vdb_id', array(':vdb_id'=>$model->id)),
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			//a unique widget id
			'id' => 'id_vdbdsres',  
			
			//the text for the remove record link
			'removeText' => 'Remove Datasource', 
			'addItemText' => 'Add DataSource/Resource Adapter information', 
			'addItemAsButton' => true,
			//see the render call in the controller actions create/update 
			//instance of the member model, 
			'model' => $vdbdsres,  
			
			//array of positions with invalid records
//			'deleteItems' => $errorIndexes, 
			
			//array of member models
			'validatedItems' => $validatedItems1, 
			'formConfig' => $vdbdsres->MultiModelForm,
			
			//array of member models as list of editable members
			'data' => $vdbdsres->findAll('vdb_id=:vdb_id', array(':vdb_id'=>$model->id)),
		));
		?><!-- gioppo -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->