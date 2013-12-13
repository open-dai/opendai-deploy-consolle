<?php
/* @var $this VdbController */
/* @var $model Vdb */

$this->breadcrumbs=array(
	'Vdbs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vdb', 'url'=>array('index')),
	array('label'=>'Create Vdb', 'url'=>array('create')),
	array('label'=>'View Vdb', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vdb', 'url'=>array('admin')),
);
?>

<h1>Update Vdb <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'table'=>$table,'vdbdsres'=>$vdbdsres,'errorIndexes' => $errorIndexes,'validatedItems'=>$validatedItems,'errorIndexes1' => $errorIndexes1,'validatedItems1'=>$validatedItems1)); ?>