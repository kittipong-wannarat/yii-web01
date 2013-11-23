<?php
/* @var $this UserNewController */
/* @var $model UserNew */

$this->breadcrumbs=array(
	'User News'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserNew', 'url'=>array('index')),
	array('label'=>'Create UserNew', 'url'=>array('create')),
	array('label'=>'View UserNew', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserNew', 'url'=>array('admin')),
);
?>

<h1>Update UserNew <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>