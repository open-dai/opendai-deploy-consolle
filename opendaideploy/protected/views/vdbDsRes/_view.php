<?php
/* @var $this VdbDsResController */
/* @var $data VdbDsRes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jndi')); ?>:</b>
	<?php echo CHtml::encode($data->jndi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poolname')); ?>:</b>
	<?php echo CHtml::encode($data->poolname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('driver')); ?>:</b>
	<?php echo CHtml::encode($data->driver); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dbname')); ?>:</b>
	<?php echo CHtml::encode($data->dbname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dbuser')); ?>:</b>
	<?php echo CHtml::encode($data->dbuser); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('connectionurl')); ?>:</b>
	<?php echo CHtml::encode($data->connectionurl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file')); ?>:</b>
	<?php echo CHtml::encode($data->file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vdb_id')); ?>:</b>
	<?php echo CHtml::encode($data->vdb_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('need_refresh')); ?>:</b>
	<?php echo CHtml::encode($data->need_refresh); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('process')); ?>:</b>
	<?php echo CHtml::encode($data->process); ?>
	<br />

	*/ ?>

</div>