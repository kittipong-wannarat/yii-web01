<?php
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'gred_1',
		'dataProvider' => $dataProvider,
		'enablePagination' => true,
		'columns'=> array(
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