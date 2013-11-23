<?php
/* @var $this UserNewController */
/* @var $model UserNew */

$this->breadcrumbs=array(
	'User News'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UserNew', 'url'=>array('index')),
	array('label'=>'Create UserNew', 'url'=>array('create')),
	array('label'=>'Update UserNew', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserNew', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserNew', 'url'=>array('admin')),
);
?>

<h1>View UserNew #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'gender',
		'address',
		'zipcode',
		'province_id',
		'username',
		'password',
		'typeuser',
	),
)); ?>
