<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('order_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->order_id), array('view', 'id' => $data->order_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('pattern_id')); ?>:
	<?php echo GxHtml::encode($data->pattern_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fullname')); ?>:
	<?php echo GxHtml::encode($data->fullname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('location_name')); ?>:
	<?php echo GxHtml::encode($data->location_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('street_address')); ?>:
	<?php echo GxHtml::encode($data->street_address); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('address2')); ?>:
	<?php echo GxHtml::encode($data->address2); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('city')); ?>:
	<?php echo GxHtml::encode($data->city); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('state')); ?>:
	<?php echo GxHtml::encode($data->state); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('country')); ?>:
	<?php echo GxHtml::encode($data->country); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('zipcode')); ?>:
	<?php echo GxHtml::encode($data->zipcode); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('color_type')); ?>:
	<?php echo GxHtml::encode($data->color_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('no_of_quantity')); ?>:
	<?php echo GxHtml::encode($data->no_of_quantity); ?>
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