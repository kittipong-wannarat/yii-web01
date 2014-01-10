<?php

Yii::import('ext.jqPrettyPhoto');
$options = array(
		'slideshow'=>5000,
		'autoplay_slideshow'=>false,
		'show_title'=>false
);
jqPrettyPhoto::addPretty('.gallery a',jqPrettyPhoto::PRETTY_GALLERY,jqPrettyPhoto::THEME_FACEBOOK, $options);

?>
<div class="gallery">
   <?=CHtml::link("View Image 1","../../images/1.png")?>
   <?=CHtml::link("View Image 1","../../images/2.jpg")?>
   <?=CHtml::link("View Image 1","../../images/3.jpg")?>
</div>