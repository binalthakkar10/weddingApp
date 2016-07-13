<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('firstname')); ?>:
	<?php echo GxHtml::encode($data->firstname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lastname')); ?>:
	<?php echo GxHtml::encode($data->lastname); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_type')); ?>:
	<?php echo GxHtml::encode($data->user_type); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('email')); ?>:
	<?php echo GxHtml::encode($data->email); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('username')); ?>:
	<?php echo GxHtml::encode($data->username); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('password')); ?>:
	<?php echo GxHtml::encode($data->password); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('created_at')); ?>:
	<?php echo GxHtml::encode($data->created_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('updated_at')); ?>:
	<?php echo GxHtml::encode($data->updated_at); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('logdate')); ?>:
	<?php echo GxHtml::encode($data->logdate); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('lognum')); ?>:
	<?php echo GxHtml::encode($data->lognum); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('is_active')); ?>:
	<?php echo GxHtml::encode($data->is_active); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('categories_id')); ?>:
	<?php echo GxHtml::encode($data->categories_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('city_id')); ?>:
	<?php echo GxHtml::encode($data->city_id); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('user_roles')); ?>:
	<?php echo GxHtml::encode($data->user_roles); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('extra')); ?>:
	<?php echo GxHtml::encode($data->extra); ?>
	<br />
	*/ ?>

</div>