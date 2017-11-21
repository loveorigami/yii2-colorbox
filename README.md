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

```
"loveorigami/yii2-colorbox" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
* In view:

```php
use lo\widgets\colorbox\Colorbox;

<?= Colorbox::widget([
    'selector' => '.colorbox',
    'clientOptions' => [
        'maxWidth' => 800,
        'maxHeight' => 600,
    ],
    'coreStyle' => 2
]) ?>
```

Iframe
-----
* In Form (parent view)

```php
use lo\widgets\colorbox\Colorbox;

echo Colorbox::widget([
    'coreStyle' => 3,
    'reload' => true,
    'selector' => '.iframe-page',
    'clientOptions' => [
        'width' => '95%',
        'height' => '95%',
        'iframe' => true,
        'fixed' => true,
    ],
]) 
```

```html
<form>
...
<a class="iframe-page" href="/site.com/admin/module/controller/update?id=1" title="edit child item"  tabindex="-1"><i class="fa fa-pencil"></i> Edit child item</a>
...
</form>
```

* In Iframe (child view)

```php
use lo\widgets\colorbox\Colorbox;

echo Colorbox::widget([
    'iframeTarget' => '.form-save, .form-cancel'
]);
```

```html
<form>
...
<button type="submit" class="btn btn-success form-save">Save</button>
<button type="button" class="btn btn-default form-cancel">Cancel</button>
...
</form>
```