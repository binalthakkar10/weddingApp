<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('event_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->event_id), array('view', 'id' => $data->event_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_name')); ?>:
	<?php echo GxHtml::encode($data->event_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_datetime')); ?>:
	<?php echo GxHtml::encode($data->event_datetime); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_location')); ?>:
	<?php echo GxHtml::encode($data->event_location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_address')); ?>:
	<?php echo GxHtml::encode($data->event_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_latitute')); ?>:
	<?php echo GxHtml::encode($data->event_latitute); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('event_longitude')); ?>:
	<?php echo GxHtml::encode($data->event_longitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_description')); ?>:
	<?php echo GxHtml::encode($data->event_description); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('event_link_album_id')); ?>:
	<?php echo GxHtml::encode($data->event_link_album_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
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