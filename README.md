Title Control
============

[![Build Status](https://github.com/dek-cz/title-control/workflows/CI/badge.svg)](https://github.com/dek-cz/title-control/actions?query=workflow%3ACI+branch%3Amain)
[![Downloads this Month](https://img.shields.io/packagist/dm/dek-cz/title-control.svg)](https://packagist.org/packages/dek-cz/title-control)
[![Latest stable](https://img.shields.io/packagist/v/dek-cz/title-control.svg)](https://packagist.org/packages/dek-cz/title-control)
[![Coverage Status](https://coveralls.io/repos/github/dek-cz/title-control/badge.svg?branch=main)](https://coveralls.io/github/dek-cz/title-control?branch=main)


Installation
------------

Via Composer:

```sh
$ composer require dek-cz/title-control
```


Usage
-----

First register the control factory in your config:
```yaml
services:
    -
        implement: Vrestihnat\TitleControl\ITitleControlFactory

```

Use the control factory in your presenter:
```php
protected function createComponentTitle(): Vrestihnat\TitleControl\TitleControl
{
    $control = $this->titleControlFactory->create();
    $control->setTitle('My title');
    return $control;
}
```

And render it in your Latte template:
```html
<html>
<head>
    {control title}
</head>
<body>
    ...
</body>
</html>
```

We can also use multi title with a separator. Default separator is: ' | '
```php
    $control->addItem('One')->addItem('Two'); // 'One | Two'
```

Change the separator:
```php
    $control->setSeparator(' ~ ');
```
We can also use nette translator

