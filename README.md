Colorbox Widget for Yii2
========================
A customizable lightbox jQuery plugin for Yii2 based on [Colorbox](http://www.jacklmoore.com/colorbox/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "loveorigami/yii2-colorbox" "*"
```

or add

```json
"loveorigami/yii2-colorbox" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
* In view:

```php
use lo\widgets\colorbox\ColorBox;

<?= ColorBox::widget([
	'selector' => '.colorbox',
    'clientOptions' => [
		'maxWidth' => 800,
		'maxHeight' => 600,
    ],
    'coreStyle' => 2
]) ?>
```
