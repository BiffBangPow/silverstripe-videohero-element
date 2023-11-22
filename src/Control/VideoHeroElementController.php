<?php

namespace BiffBangPow\Element\Control;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;
use SilverStripe\View\ThemeResourceLoader;

class VideoHeroElementController extends ElementController
{
    protected function init()
    {
        parent::init();
        $themeCSS = ThemeResourceLoader::inst()->findThemedCSS('client/dist/css/elements/videohero');
        if ($themeCSS) {
            Requirements::css($themeCSS, '', ['inline' => true]);
        }
    }
}