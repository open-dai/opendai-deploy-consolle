<?php
/* @var $this VdbDsResController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vdb Ds Res',
);

$this->menu=array(
	array('label'=>'Create VdbDsRes', 'url'=>array('create')),
	array('label'=>'Manage VdbDsRes', 'url'=>array('admin')),
);
?>

<h1>Vdb Ds Res</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
