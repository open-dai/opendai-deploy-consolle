<?php
/* @var $this VdbDsResController */
/* @var $model VdbDsRes */

$this->breadcrumbs=array(
	'Vdb Ds Res'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VdbDsRes', 'url'=>array('index')),
	array('label'=>'Create VdbDsRes', 'url'=>array('create')),
	array('label'=>'Update VdbDsRes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VdbDsRes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VdbDsRes', 'url'=>array('admin')),
);
?>

<h1>View VdbDsRes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'jndi',
		'poolname',
		'driver',
		'dbname',
		'dbuser',
		'connectionurl',
		'file',
		'vdb_id',
		'need_refresh',
		'process',
	),
)); ?>
