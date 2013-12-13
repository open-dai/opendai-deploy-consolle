<?php
/* @var $this VdbDsResController */
/* @var $model VdbDsRes */

$this->breadcrumbs=array(
	'Vdb Ds Res'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VdbDsRes', 'url'=>array('index')),
	array('label'=>'Create VdbDsRes', 'url'=>array('create')),
	array('label'=>'View VdbDsRes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VdbDsRes', 'url'=>array('admin')),
);
?>

<h1>Update VdbDsRes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>