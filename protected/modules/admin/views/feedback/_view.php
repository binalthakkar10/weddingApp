<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('feedback_id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->feedback_id), array('view', 'id' => $data->feedback_id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('wedding_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->wedding)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rating')); ?>:
	<?php echo GxHtml::encode($data->rating); ?>
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
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('feedback')); ?>:
	<?php echo GxHtml::encode($data->feedback); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('field2')); ?>:
	<?php echo GxHtml::encode($data->field2); ?>
	<br />
	*/ ?>

</div>