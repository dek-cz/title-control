Title Control
============

[![Build Status](https://github.com/vrestihnat/title-control/workflows/CI/badge.svg)](https://github.com/vrestihnat/title-control/actions?query=workflow%3ACI+branch%3Amain)
[![Downloads this Month](https://img.shields.io/packagist/dm/vrestihnat/title-control.svg)](https://packagist.org/packages/vrestihnat/title-control)
[![Latest stable](https://img.shields.io/packagist/v/vrestihnat/title-control.svg)](https://packagist.org/packages/vrestihnat/title-control)


Installation
------------

Via Composer:

```sh
$ composer require vrestihnat/title-control
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
