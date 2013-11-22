<?php
/* @var $this TestAjaxController */


?>

<div class="form">
<?php echo CHtml::beginForm();?>
<div class ="row">
<?php echo CHtml::activeTextField($model,'field1');?>
<?php echo CHtml::activeTextField($model,'field2');?>
<?php 
echo CHtml::ajaxSubmitButton(
		'Save',
		array('testajax/save','id'=>$model->id),
		array(
				'update'=>'#req_result',
				'beforeSend'=>'function(call,settings) {
				$("#req_result").html("Saving, Please wait...");}',		
				)
		
		
		);
?>
<div id="req_result"></div>

</div> <!--  row  -->

<?php echo CHtml::endForm(); ?>
</div><!--  from  -->