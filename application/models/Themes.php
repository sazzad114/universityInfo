<?php

class Themes 
{

    const DEFAULT_LAYOUT = 'sunset';
    const SUNSET_LAYOUT = 'sunset';
    const BLUESKY_LAYOUT = 'bluesky';
	const FOREST_LAYOUT = 'forest';
	
    public static function setLayoutName($layoutName) {
        $layout = new Zend_Session_Namespace('layout');
        $layout->layoutName = $layoutName;
    }

    public static function getLayoutName() {
        $layout = new Zend_Session_Namespace('layout');
        return $layout->layoutName == null ? self::DEFAULT_LAYOUT : $layout->layoutName;
    }
}