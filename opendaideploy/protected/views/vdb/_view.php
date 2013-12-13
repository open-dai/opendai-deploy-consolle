<?php
/* @var $this VdbController */
/* @var $data Vdb */
$tables = Vdbtables::model()->findAllByAttributes(array('vdb_id'=>$data->id,));
?>

<div class="view">
<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?>
	<?php if($data->need_refresh){?>
	<span class="label label-important">The VBD need to be redeployed</span> 
	<?php }?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vdbfile')); ?>:</b>
	<?php echo CHtml::encode($data->vdbfile); ?>
	<br />

	<b>Tables in VDB:</b>
	<span class="badge badge-warning"><?php echo count($tables); ?></span>
	<br />

</div>