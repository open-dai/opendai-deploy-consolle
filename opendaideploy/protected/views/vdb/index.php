<?php
/* @var $this VdbController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vdbs',
);

$this->menu=array(
	array('label'=>'Create Vdb', 'url'=>array('create')),
	array('label'=>'Manage Vdb', 'url'=>array('admin')),
);
?>

<h1>Vdbs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
