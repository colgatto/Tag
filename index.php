<?php

require_once 'Tag.php';

$html = new Tag('html','',array(
	new Tag('head'),
	new Tag('body','',array(
		(new Tag('h1'))->text('LogIn'),
		$form = (new Tag('form','',array(
			'primo' => new Tag('input aggiungi autofocus'),
			'secondo' => new Tag('input'),
			'terzo' => (new Tag('input'))->attr('type','submit')->attr('name','invia')
		)))->attr('method','get')
	))
));

$form->f('primo')->addClass('input')->attr('type','text')->attr('name','name');
$form->f('secondo')->attr('type','password')->attr('name','password');

echo $html;

?>