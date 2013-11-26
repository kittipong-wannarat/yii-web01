<?php
/* @var $this SyntaxController */

$this->breadcrumbs=array(
	'Syntax',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php  Yii::app()->syntaxhighlighter->addHighlighter();?>

<pre class="brush : php">
function Hello($world) {
echo 'Hello' . $woeld;
}
</pre>