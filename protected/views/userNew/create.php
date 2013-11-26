<?php
/* @var $this UserNewController */
/* @var $model UserNew */

$this->breadcrumbs=array(
	'User News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserNew', 'url'=>array('index')),
	array('label'=>'Manage UserNew', 'url'=>array('admin')),
);
?>

<h1>Create UserNew</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>