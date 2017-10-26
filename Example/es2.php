<?php

require_once '../Tag.php';

$html = new Tag('html','',array(
	'head' => new Tag('head'),
	'body' => new Tag('body','',array(
		'title' => new Tag('h1'),
		'form' => new Tag('form','',array(
			'first' => new Tag('input disabled checked '),
			'second' => new Tag('input'),
			'third' => new Tag('input')
		))
	))
));

$html->f('body')->f('title')->text('LogIn');
$html->f('body')->f('form')->f('third')->attr('type','submit')->attr('name','invia');
$html->f('body')->f('form')->f('first')->addClass('input')->attr('type','text')->attr('name','name');
$html->f('body')->f('form')->f('second')->attr('type','password')->attr('name','password');
$html->f('body')->f('form')->attr('method','get');

echo $html;

?>