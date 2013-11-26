<?php
/* @var $this CrudController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Manage Profile', 'url'=>array('admin')),
);
?>

<h1>Create Profile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>