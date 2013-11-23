<?php
/* @var $this MemberController */

$this->breadcrumbs=array(
		'Member',
);
?>
<h1>
	<?php echo $this->id . '/' . $this->action->id; ?>
</h1>

<p>

	You may change the content of this page by modifying the file
	<tt>
		<?php echo __FILE__; ?>
	</tt>
	.
	<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
			'id' => 'grid_1',                   // ชื่อตาราง
			'dataProvider' => $dataProvider,    // ตัวแปร data ที่มีข้อมูล
			'enablePagination' => true,         // กำหนดให้แสดงปุ่มเปลี่ยนหน้า
			'columns' => array(                 // กำหนด column ที่จะแสดง
					array(
							'name' => 'id',
							'header' => 'ID',
					),
					array(
							'name' => 'username',
							'header' => 'Username',
					),
					array(
							'name' => 'firstname',
							'header' => 'Firstname',
					),
					array(
							'name' => 'lastname',
							'header' => 'Lastname',
					),
			),
	));
	?>
</p>
