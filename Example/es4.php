<?php

require_once '../Tag.php';

$html = new Tag('html','',array(
	new Tag('head'),
	new Tag('body','',array(
		(new Tag('h1'))->text('LogIn'),
		$form = (new Tag('form','',array(
			'first' => new Tag('input disabled checked '),
			'second' => new Tag('input'),
			'third' => (new Tag('input'))->attr('type','submit')->attr('name','invia')
		)))->attr('method','get')
	))
));

$form->f('first')->addClass('input')->attr('type','text')->attr('name','name');
$form->f('second')->attr('type','password')->attr('name','password');

echo $html;

?>