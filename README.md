# Tag (simple HTML interface for PHP)

[![HitCount](http://hits.dwyl.io/colgatto/Tag.svg)](http://hits.dwyl.io/colgatto/Tag)

## Usage

just include Tag.php in your code

```php
include 'Tag.php';
```

then you can create your Tag element

```php
$html = new Tag('html');
$head = new Tag('head');
$body = new Tag('body');
$title = new Tag('h1');
$form = new Tag('form');
$first = new Tag('input disabled checked ');
$second = new Tag('input');
$third = new Tag('input');
```

add text, class or attribute to your element

```php
$title->text('LogIn');

$third->attr('type','submit');
$third->attr('name','invia');

$first->addClass('input');
$first->attr('type','text');
$first->attr('name','name');

$second->attr('type','password');
$second->attr('name','password');

$form->attr('method','get');
```

link the parts together
```php
$html->append($head);
$html->append($body);
$body->append($form);
$form->append($second);
$form->append($third);
$form->appendToTop($first);
$body->appendToTop($title);
```

finaly you can print the root element
```php
echo $html;
```

output will be like this
```php
<html>
<head>

</head>
<body>
<h1>
LogIn
</h1>
<form method="get">
<input class="input" type="text" name="name" disabled checked />
<input type="password" name="password" />
<input type="submit" name="invia" />
</form>
</body>
</html>
```

this is just a simple example, the code down here has the same output

## Example 2

use only one variable by passing key => value array and locate desired element using f()  
```php
$html = new Tag('html','',array(
	'head' => new Tag('head'),
	'body' => new Tag('body','',array(
		'title' => new Tag('h1'),
		'form' => new Tag('form','',array(
			'first' => new Tag('input disabled checked'),
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
```

## Example 3

no variable, no append, just one big single expression 
```php
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
```
## Example 4

mixed style, use what you want wherever you like it
```php
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
```
