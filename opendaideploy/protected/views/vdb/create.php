<?php
/* @var $this VdbController */
/* @var $model Vdb */

$this->breadcrumbs=array(
	'Vdbs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vdb', 'url'=>array('index')),
	array('label'=>'Manage Vdb', 'url'=>array('admin')),
);
?>

<h1>Create Vdb</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'table'=>$table,'vdbdsres'=>$vdbdsres,'errorIndexes' => $errorIndexes,'validatedItems'=>$validatedItems,'errorIndexes1' => $errorIndexes1,'validatedItems1'=>$validatedItems1)); ?>