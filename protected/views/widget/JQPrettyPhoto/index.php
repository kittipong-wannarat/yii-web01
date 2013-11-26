<?php
$setPhoto = array(
		'imgPath' => 'ext.prettyPhoto.jqPrettyPhoto',
		'imgType' => 'images',
		'imgPretty' => 1,
		'imgTheme' => 'dark_rounded',
		'imgWidth' => 100,
		'imgHeight' => 100,
		'imgOption' => array(
				'slideshow' => 5000,
				'autoplay_slideshow' =>false,
				'show_title' => false
		) ,
		'imgItems'=>array(
				array(
						'src'=>'../../images/first-placeholder830x400.jpg',
						'title'=> 'View Image 1',
						'content'=>'Image Content 1'
				),
				array(
						'src'=>'../../images/second-placeholder830x400.jpg',
						'title'=>'View Image 2',
						'content'=>'Image Content 2'
				),
				array(
						'src'=>'../../images/third-placeholder830x400.jpg',
						'title'=>'View Image 3',
						'content'=>'Image Content 3'
				),
		),

);
Yii::import($setPhoto['imgPath']);

jqPrettyPhoto::addPretty(
'.gallery a',
$setPhoto['imgPretty'],
$setPhoto['imgTheme'],
$setPhoto['imgOption']
);


$setCSS="ul li {display: inline; margin-right:2px;}";
Yii::app()->clientScript->registerCss('css1',$setCSS);

if (isset($setPhoto['imgItems'])) {
	if ($setPhoto['imgType'] === 'images'){
		echo '<ul class="gallery clearfix">';
		foreach ($setPhoto['imgItems'] as $value) {
			echo '<li>'.CHtml::link (

					CHtml::image("{$value['src']}","{$value['title']}",array(
							'width'=>$setPhoto['imgWidth'],
							'height'=>$setPhoto['imgHeight']
					)),
					"{$value['src']}",array(
							'rel'=>'prettyPhoto',
							'title' => "{$value['content']}"
					)
			);
			echo '</li>';
		}
		echo '</ul>';
	}

	if ($setPhoto['imgType'] === 'link') {
		foreach ($setPhoto['imgItems'] as $value) {
			echo CHtml::link("{$value['title']}",
			"{$value['src']}",array(
					'rel'=>'prettyPhoto',
					'title'=>"{$value['content']}"
			)
			);
		}

	}

}









