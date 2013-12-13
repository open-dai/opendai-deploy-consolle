<?php
/* @var $this VdbDsResController */
/* @var $model VdbDsRes */

$this->breadcrumbs=array(
	'Vdb Ds Res'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VdbDsRes', 'url'=>array('index')),
	array('label'=>'Manage VdbDsRes', 'url'=>array('admin')),
);
?>

<h1>Create VdbDsRes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>