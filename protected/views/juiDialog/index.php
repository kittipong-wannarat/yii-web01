<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id'=>'mydialog',
		'options'=>array(
				'title'=>'Dialog box 1',
				'autoOpen'=> false,
				'modal'=>true,
		),
));

echo 'dialog content here';
$this->endWidget('zii.widgets.jui.CJuiDialog');
echo CHtml::link('open dialog', '#' ,array(
		'onclick'=>'$("#mydialog").dialog("open"); return false;',
));

?>
