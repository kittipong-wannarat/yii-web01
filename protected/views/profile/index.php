<?php
$this->widget('zii.widgets.CDetailView', array(
		'data' => $model,
		'attributes' =>array(
				'firstname',
				'lastname',
				array(
						'lable'=>'View',
						'type'=>'raw',
						'value'=>CHtml::link(CHtml::encode($model->firstname),
								array('profile/view','id'=>$model->id)),
				),
		)
));
$this->widget('zii.widgets.CDetailView', array(
		'data' => Yii::app()->session['Employee'],
		'attributes'=>array(
				'firstname',
				'lastname',
				'position',
				'phone',
				'ext',
				'email',
),
));