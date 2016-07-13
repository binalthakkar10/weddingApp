<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->wedding_id), array('view', 'id' => $data->wedding_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to_bride_name')); ?>:
	<?php echo GxHtml::encode($data->to_bride_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to_groom_name')); ?>:
	<?php echo GxHtml::encode($data->to_groom_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('to_partner_name')); ?>:
	<?php echo GxHtml::encode($data->to_partner_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_bride_name')); ?>:
	<?php echo GxHtml::encode($data->from_bride_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('from_groom_name')); ?>:
	<?php echo GxHtml::encode($data->from_groom_name); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('from_partner_name')); ?>:
	<?php echo GxHtml::encode($data->from_partner_name); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_date')); ?>:
	<?php echo GxHtml::encode($data->wedding_date); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_location')); ?>:
	<?php echo GxHtml::encode($data->wedding_location); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_uniq_id')); ?>:
	<?php echo GxHtml::encode($data->wedding_uniq_id); ?>
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
	<?php echo GxHtml::encode($data->getAttributeLabel('image')); ?>:
	<?php echo GxHtml::encode($data->image); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field2')); ?>:
	<?php echo GxHtml::encode($data->field2); ?>
	<br />
	*/ ?>

</div>