<h1>เพิ่มหน่วยนับ</h1>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id' => 'mydialog',
		'options'=>array(
				'title'=>'เพิ่มหน่วยนับ',
				'autoOpen'=>false,
				'modal'=>true,
),
));
?>
<div class="form">
	<?php echo CHtml::beginForm();?>
	<div class="row">
		<?php echo CHtml::activeTextField($model,'pack_name');?>
		<?php echo CHtml::ajaxSubmitButton(
				'save',array(
				'package/save',
						'id'=>$model->id),
		array(
				'update'=>'#req_result',
				'beforeSend' => 'function (call,settings) {
				$("req_result").html("กำลังประมาลผล..");
}',
				'success'=>'js:function() {
				$.fn.yiiGridView.update("p-grid");
				$("#mydialog").dialog("close")
}',
)
		);
		?>
		<div id="req_result"></div>

	</div>
	<!-- row -->
	<?php echo CHtml::endForm();?>
</div>
<!-- form -->
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');
echo CHtml::link('เพิ่มหน่วยนับ','#', array(
'onclick'=>'$("#mydialog").dialog("open");
return false;',

));

$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'p-grid',
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				array(
						'name'=>'pack_name',
						'header' => 'ชื่อ',),
		),
)); ?>
