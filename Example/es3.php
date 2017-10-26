<?php

require_once '../Tag.php';

echo new Tag('html','',array(
	new Tag('head'),
	new Tag('body','',array(
		(new Tag('h1'))->text('LogIn'),
		(new Tag('form','',array(
			(new Tag('input disabled checked '))->addClass('input')->attr('type','text')->attr('name','name'),
			(new Tag('input'))->attr('type','password')->attr('name','password'),
			(new Tag('input'))->attr('type','submit')->attr('name','invia')
		)))->attr('method','get')
	))
));

?>