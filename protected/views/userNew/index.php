<?php
/* @var $this UserNewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User News',
);

$this->menu=array(
	array('label'=>'Create UserNew', 'url'=>array('create')),
	array('label'=>'Manage UserNew', 'url'=>array('admin')),
);
?>

<h1>User News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
