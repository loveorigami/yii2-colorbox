<?php

namespace lo\widgets\colorbox;

use Yii;
use yii\web\AssetBundle;

class ColorboxAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-colorbox';

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $coreStyle = 1;

    public function init()
    {
        parent::init();
        $this->js[] = YII_DEBUG ? 'jquery.colorbox.js' : 'jquery.colorbox-min.js';
        $this->registerLanguageAsset();
    }

    /**
     * @param \yii\web\View $view
     */
    public function registerAssetFiles($view)
    {
        if ($this->coreStyle) {
            $this->css[] = "example{$this->coreStyle}/colorbox.css";
        }
        parent::registerAssetFiles($view);
    }

    protected function registerLanguageAsset()
    {
        $language = Yii::$app->language;
        if (!file_exists(Yii::getAlias($this->sourcePath . "/i18n/jquery.colorbox-{$language}.js"))) {
            $language = substr($language, 0, 2);
            if (!file_exists(Yii::getAlias($this->sourcePath . "/i18n/jquery.colorbox-{$language}.js"))) {
                return;
            }
        }

        $this->js[] = "i18n/jquery.colorbox-{$language}.js";
    }
}