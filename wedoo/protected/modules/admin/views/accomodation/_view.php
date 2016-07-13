<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('accomodation_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->accomodation_id), array('view', 'id' => $data->accomodation_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
	<?php echo GxHtml::encode($data->user_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accom_name')); ?>:
	<?php echo GxHtml::encode($data->accom_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accom_address')); ?>:
	<?php echo GxHtml::encode($data->accom_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accom_web_url')); ?>:
	<?php echo GxHtml::encode($data->accom_web_url); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('accom_desc')); ?>:
	<?php echo GxHtml::encode($data->accom_desc); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('status')); ?>:
	<?php echo GxHtml::encode($data->status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field1')); ?>:
	<?php echo GxHtml::encode($data->field1); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field2')); ?>:
	<?php echo GxHtml::encode($data->field2); ?>
	<br />
	*/ ?>

</div>