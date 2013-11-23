<?php
$this->widget('zii.widgets.grid.CGridView', array(
		'id' => 'grid_1',
		'dataProvider' => $dataProvider,
		'enablePagination' => true,
		'columns' => array(
				array(
						'name' => 'id',
						'header' => 'iD',
				),
				array(
						'name' => 'username',
						'header' => 'Username',
				),
				array(
						'name' => 'myprofile.firstname',
						'header' => 'Firstname',
				),
				array(
						'name' => 'myprofile.lastname',
						'header' => 'Lastname',
				),



		)
));
