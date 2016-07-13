<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('payment_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->payment_id), array('view', 'id' => $data->payment_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('order_id')); ?>:
	<?php echo GxHtml::encode($data->order_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_id')); ?>:
	<?php echo GxHtml::encode($data->wedding_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('album_id')); ?>:
	<?php echo GxHtml::encode($data->album_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('transaction_id')); ?>:
	<?php echo GxHtml::encode($data->transaction_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('payment_amount')); ?>:
	<?php echo GxHtml::encode($data->payment_amount); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('currency_type')); ?>:
	<?php echo GxHtml::encode($data->currency_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('payment_mode')); ?>:
	<?php echo GxHtml::encode($data->payment_mode); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('payment_status')); ?>:
	<?php echo GxHtml::encode($data->payment_status); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('payment_message')); ?>:
	<?php echo GxHtml::encode($data->payment_message); ?>
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