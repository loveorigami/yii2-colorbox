<?php

namespace lo\widgets\colorbox;

use yii\base\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * Class Colorbox
 * Widget renders an Colorbox lightbox jQuery widget.
 *
 * For example:
 *
 * ```php
 * echo Colorbox::widget([
 *     'selector' => '.colorbox',
 *     'clientOptions' => [
 *          'maxWidth' => 800,
 *          'maxHeight' => 600,
 *      ],
 *      'coreStyle' => 2
 * ]);
 * ```
 * @see http://www.jacklmoore.com/colorbox/
 * @package lo\widgets\colorbox
 * @author Lukyanov Andrey <loveorigami@mail.ru>
 */
class Colorbox extends Widget
{
    /** @var string */
    public $selector;

    /** @var  bool */
    public $reload;

    /** @var  string */
    public $iframeTarget;

    /** @var array */
    public $clientOptions;


    /**
     * @var integer|boolean $coreStyle A number from 1 to 5 connects style from the appropriate `example` folders.
     * Set it to `false`, if you don't need to connect the built-in styles.
     */
    public $coreStyle = 1;

    public function init()
    {
        parent::init();

        if ($this->reload) {
            $this->clientOptions['onClosed'] = new JsExpression('function(){
                location.reload(true);
            }');
        }
    }

    public function run()
    {
        parent::run();
        $view = $this->getView();

        if ($this->iframeTarget) {
            $js = "
            $('{$this->iframeTarget}').click(function(){
				parent.$.colorbox.close();
            })";
        } else {
            $options = Json::encode($this->clientOptions);
            $selector = $this->selector;
            $js = "$('$selector').colorbox($options);" . PHP_EOL;
        }

        $bundle = ColorboxAsset::register($view);
        if ($this->coreStyle !== false) {
            $bundle->coreStyle = $this->coreStyle;
        }
        $view->registerJs($js);
    }
}
