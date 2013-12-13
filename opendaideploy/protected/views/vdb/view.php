<?php
/* @var $this VdbController */
/* @var $model Vdb */

$this->breadcrumbs=array(
	'Vdbs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Vdb', 'url'=>array('index')),
	array('label'=>'Create Vdb', 'url'=>array('create')),
	array('label'=>'Update Vdb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Vdb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vdb', 'url'=>array('admin')),
	array('label'=>'Get Vdb file', 'url'=>array('file', 'id'=>$model->id)),
);
if ($model->need_refresh){
$this->menu[]=array('label'=>'Deploy VDB', 'url'=>array('deploy', 'id'=>$model->id));
}
?>

<h1>View Vdb #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'vdbfile',
		'user_id',
	),
)); 
if(!empty($tables)){ ?>
<h2>tables in VDB</h2>
<?php
/*
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$tables,
	'attributes'=>array(
		'id',
		'type',
		'file',
		'driver',
	),
));
*/
$this->widget('zii.widgets.grid.CGridView', array(
'dataProvider'=>new CArrayDataProvider($tables, array('keyField' => 'id',)),
'columns'=>array(
        'id','name'),
 ));

}
if(!empty($vdbdsres)){ ?>
<h2>Resources of the VDB</h2>
<?php
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$vdbdsres,
	'attributes'=>array(
		'id',
		'type',
		'file',
		'driver',
	),
));
}
?>
