<?php

require_once '../Tag.php';

$html = new Tag('html');
$head = new Tag('head');
$body = new Tag('body');
$title = new Tag('h1');
$form = new Tag('form');
$first = new Tag('input disabled checked ');
$second = new Tag('input');
$third = new Tag('input');

$title->text('LogIn');

$third->attr('type','submit');
$third->attr('name','invia');

$html->append($head);
$html->append($body);
$body->append($form);

$first->addClass('input');
$first->attr('type','text');
$first->attr('name','name');

$second->attr('type','password');
$second->attr('name','password');

$form->attr('method','get');
$form->append($second);
$form->append($third);
$form->appendToTop($first);

$body->appendToTop($title);

echo $html;

?>